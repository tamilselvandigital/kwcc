<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Auth;
use App\Models\TaskDb;
use Log;
use App\Models\Util;
use App\Models\Validate;
use DB;

class Task extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public $edit_id,$message,$error,$alert_modal=0,$alert_content,$confirm_function,$confirm_modal=0,$confirm_content,$submit_text='Create',$pagination_page,$pagination_total,$pagination_limit=10,$pagination_links;
    public $task,$due_date="",$due_hours,$due_minutes,$status;
    public $mode = "";
    /**
     * Default render the task page
     *
     * @return void
     */
    public function render()
    {
        //return view('livewire.task',['data1' => TaskDb::paginate(2, ['*'], 'page', 1),'mydate' => date("i:s")]);
        return view('livewire.task',['data' => TaskDb::orderBy('id', 'desc')->paginate($this->pagination_limit)]);
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
        return view('task');
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
            Log::info('validating task...'.$this->due_date);
            
            // Validate task input details
            Validate::task_validate($this);

			TaskDb::create([
                'task' => $this->task,
                'due_date' => $this->due_date." ".$this->due_hours.":".$this->due_minutes.":00 ",
                'status' => 'NEW',
                'created_at' => date("Y-m-d"),
                'created_by' => 'User',
			]);
		
			$this->resetForm();
            Util::showAlert($this,'Task created successfully');
           // $this->paginate(1);
            //$this->dispatchBrowserEvent('closeModal');
               
			} catch (\Illuminate\Database\QueryException $e) {
				$this->error = $e->getMessage();
                return false;
			}
    }
     /**
     *  Populating Edit form with existing data
     *
     * @return void
     */
    public function editForm($id)
    {
        $record = TaskDb::findOrFail($id);
        $this->edit_id = $id;
        $this->task = $record->task;
        $this->due_date = date("Y-m-d",strtotime($record->due_date));
        $this->due_hours = date("H",strtotime($record->due_date));
        $this->due_minutes = date("i",strtotime($record->due_date));
        $this->mode = 'edit';
        $this->submit_text = "Update";

    }
    /**
     *  Update Task
     *
     * @return void
     */
	public function update()
    {
		 try {
            // Validate task input details
			Validate::task_validate($this);
            if ($this->edit_id) {
				$record = TaskDb::find($this->edit_id);
                $record->update([
                    'task' => $this->task,
                    'due_date' => $this->due_date." ".$this->due_hours.":".$this->due_minutes.":00 ",
                    'updated_at' => date("Y-m-d"),
                    'updated_by' => 'User',
		    	]);
                $this->resetForm();
				Util::showAlert($this,'Task updated successfully...!');
				
            }
    
			} catch (\Illuminate\Database\QueryException $e) {
				$this->error = $e->getMessage();
                return false;
			}
    }
    
    /**
     *  Get Task data with pagination
     *
     * @return void
     */
    public function paginate($pageNumber)
    {
        $pagination = TaskDb::paginate($this->pagination_limit, ['*'], 'page', $pageNumber);
        $this->data = $pagination->getCollection();
        $this->pagination_page = $pageNumber;
       // $this->pagination_total = 
      // $this->data = $pagination->items();
       // $this->pagination_links = $pagination->links();
    }
    /**
     *  Change status of the Task
     *
     * @return void
     */
	public function changeStatus($id)
    {
		 try {
            if ($id) {
				$record = TaskDb::find($id);
                $record->update([
                    'status' => 'COMPLETED',                  
                    'updated_at' => date("Y-m-d"),
                    'updated_by' => 'User',
		    	]);
                $this->resetForm();
				Util::showAlert($this,'Task status changed successfully...!');
            }
    
			} catch (\Illuminate\Database\QueryException $e) {
				$this->error = $e->getMessage();
                return false;
			}
    }
    /**
     *  Removing Task
     *
     * @return void
     */
    public function destroy($id)
    {
        if ($id) {
            $record = TaskDb::where('id', $id)->delete();
            $this->resetForm();
            //$this->data = TaskDb::all();
            $this->paginate(1);
        }
    }
	public function resetForm()
    {
		$this->mode = '';
        $this->submit_text = "Create";
        $this->task="";
        $this->due_date="";
        $this->due_time="";
        $this->due_hours="";
        $this->due_minutes = "";
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
       // $this->alert_modal = 0;
       // $this->alert_content = "";
       Util::closeNotification($this);
    }
    
	
}