<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Auth;
use App\Models\HistoryDb;
use Log;
use App\Models\Util;
use App\Models\Validate;
use DB;


class History extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public $edit_id,$message,$error,$alert_modal=0,$alert_content,$confirm_function,$confirm_modal=0,$confirm_content,$submit_text='Create',$pagination_limit=10;
    public $title,$description,$event_date="",$status;
    public $mode = "";
    /**
     * Default render the task page
     *
     * @return void
     */
    public function render()
    {
        
        return view('livewire.history',['data' => HistoryDb::orderBy('id', 'desc')->paginate($this->pagination_limit)]);
        //return view('livewire.task');
    }
     /**
     * Mount the default function and pass the task list
     *
     * @return void
     */
	public function mount()
    {
       // $this->data = TaskDb::all();
      // $this->paginate(1);
    }
    /**
     * Load the Task page
     *
     * @return void
     */
	public function index()
    {
		/*
		if(!Auth::check()) {   	
			return redirect()->to('/login');
		}
		*/
        return view('history');
    }
    /**
     *  Create Task
     *
     * @return void
     */
	public function create()
    {
        Log::info('create task...');

        if($this->mode=="edit") {
			$this->update();
			return false;
		}

		 try {
            Log::info('validating history...');
            // Validate task input details
            Validate::history_validate($this);

			HistoryDb::create([
                'title' => $this->title,
                'description' => $this->description,
                'event_date' => $this->event_date,
                'status' => 'NEW',
                'created_at' => date("Y-m-d"),
                'created_by' => 'User',
			]);
		
			$this->resetForm();
            Util::showAlert($this,'History created successfully');

           // $this->paginate(1);
            //$this->dispatchBrowserEvent('closeModal');
               
			} catch (\Illuminate\Database\QueryException $e) {
				$this->error = $e->getMessage();
                return false;
			}
    }
     /**
     *  Populating Edit form for History
     *
     * @return void
     */
    public function editForm($id)
    {
        $record = HistoryDb::findOrFail($id);
        $this->edit_id = $id;
        $this->title = $record->title;
        $this->description = $record->description;
        $this->event_date = $record->event_date;
        $this->mode = 'edit';
        $this->submit_text = "Update";

     //   Util::showAlert($this,'Test content...!');

    }
    /**
     *  Update History
     *
     * @return void
     */
	public function update()
    {
		 try {
            // Validate task input details
            Validate::history_validate($this);

            if ($this->edit_id) {
				$record = HistoryDb::find($this->edit_id);
                $record->update([
                    'title' => $this->title,
                    'description' => $this->description,
                    'event_date' => $this->event_date,
                    'updated_at' => date("Y-m-d"),
                    'updated_by' => 'User',
		    	]);
                $this->resetForm();
				Util::showAlert($this,'History updated successfully...!');
				//$this->data = TaskDb::all();
               // $this->paginate(1);
                //$this->dispatchBrowserEvent('closeModal');
            }
    
			} catch (\Illuminate\Database\QueryException $e) {
				$this->error = $e->getMessage();
                return false;
			}
    }
    
    /**
     *  Get History data with pagination
     *
     * @return void
     */
    public function paginate($pageNumber)
    {
        $pagination = HistoryDb::paginate($this->pagination_limit, ['*'], 'page', $pageNumber);
        $this->data = $pagination->getCollection();
        $this->pagination_page = $pageNumber;
       
    }
    
    /**
     *  Removing History
     *
     * @return void
     */
    public function destroy($id)
    {
        if ($id) {
            $record = HistoryDb::where('id', $id)->delete();
            $this->resetForm();
            //$this->data = HistoryDb::all();
            $this->paginate(1);
        }
    }
	public function resetForm()
    {
		$this->mode = '';
        $this->submit_text = "Create";
        $this->title="";
        $this->description="";
        $this->event_date="";
        $this->error="";
		$this->errors=null;
        $this->alert_modal = 0;
        $this->alert_content = "";
        $this->confirm_modal=0;
        $this->confirm_content='';
        $this->confirm_function='';
		$this->resetErrorBag();
		$this->resetValidation();
    }
    public function closeNotification() {
        Util::closeNotification($this);
    }
     /**
     * Display the alert box with response message
     *
     * @var array
     */
    /*
    public  function showAlert($msg){
        $this->alert_modal=1;
        $this->alert_content = $msg;
		$this->dispatchBrowserEvent('closeModal');
	}
	*/
}