<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Util extends Model
{
   // use HasFactory;

    /**
     * Display the alert box with response message
     *
     * @var array
    */
    public static function showAlert($this_parent,$msg){
        $this_parent->alert_modal=1;
        $this_parent->alert_content = $msg;
		$this_parent->dispatchBrowserEvent('closeModal');
	}
     /**
     * Close the alert box
     *
     * @var array
    */
    public static function closeNotification($this_parent) {
        $this_parent->alert_modal = 0;
        $this_parent->alert_content = "";
    }
    
}
