<div class="min-h-screen bg-gray-100">
    <div>
      @if($error || count($errors) > 0)
      <div class="rounded-md bg-red-50 p-4 alert">
      <div class="flex">
      <div class="flex-shrink-0">
      <!-- Heroicon name: solid/x-circle -->
      <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
      <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
      </svg>
      </div>
      <div class="ml-3">
      <h3 class="text-sm font-medium text-red-800">
      There were some errors with your submission   
      </h3>
      <div class="mt-2 text-sm text-red-700">
      <ul class="list-disc pl-5 space-y-1">
      @if($error!="")
        <li>
        {{ $error }}
        </li>
        @endif
         @if (count($errors) > 0)
              @foreach ($errors->all() as $this_error)
                <li>{{ $this_error }}</li> 
              @endforeach
        @endif
      
      </ul>
      </div>
      </div>
      </div>
      </div>
      @endif
      </div>
     <main class="py-2">
      <div class="mt-8 max-w-3xl mx-auto grid grid-cols-1 gap-6 sm:px-6 lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-3">
        <div class="space-y-6 lg:col-start-1 lg:col-span-2">
          <!-- Description list-->
          <section aria-labelledby="applicant-information-title">
            <div class="bg-white shadow sm:rounded-lg">
              <div class="px-4 py-5 sm:px-6">
                <h2 id="applicant-information-title" class="text-lg leading-6 font-medium text-gray-900">
                  Task List 
                </h2>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                  User task details
                </p>
              </div>
             

              <!-- This example requires Tailwind CSS v2.0+ -->
<div class="bg-white shadow overflow-hidden sm:rounded-md">
    <ul class="divide-y divide-gray-200">
      @if(isset($data))  
      @foreach($data as $row) 
      <li >
        <a href="#" class="block hover:bg-gray-50">
          <div class="flex items-center px-4 py-4 sm:px-6">
            <div class="min-w-0 flex-1 flex items-center" wire:click="editForm('{{ $row->id }}')">
              <div class="flex-shrink-0">
               <!-- <img class="h-12 w-12 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixqx=acCjMDB7b9&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt=""> -->
               <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 rounded-full" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
              </div>
              <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                <div>
                  <p class="text-sm font-medium text-indigo-600 truncate" >Edit</p>
                  <p class="mt-2 flex items-center text-sm text-gray-500">
                   
                   
                    <span class="truncate">{{ $row->task }}</span>
                  </p>
                </div>
                <div class="hidden md:block">
                  <div>
                    <p class="text-sm text-gray-900">
                      Due on
                      <time datetime="2020-01-07" @if($row->due_date<date('Y-m-d H:i')) class='text-red-900' @else class='text-green-900' @endif >{{ date("d M, Y",strtotime($row->due_date)) }}</time>
                    </p>
                    <p class="mt-2 flex items-center text-sm text-gray-500">
                      <!-- Heroicon name: solid/check-circle -->
                      <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                      </svg>
                      {{ $row->status }} 
                    </p>
                  </div>
                </div>
              </div>
               <!-- Heroicon name: solid/chevron-right -->
               <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
              </svg>
            </div>

            <div>
             
            
              <input type="checkbox" wire:click="changeStatus({{$row->id}})" name="status" id="status"
                onchange="this.dispatchEvent(new InputEvent('input'))"  autocomplete="off" 
              class="shadow-sm block h-5 w-5 focus:ring-blue-500 focus:border-blue-500 sm:text-sm border-gray-300 rounded-md"
             >

            </div>
          </div>
        </a>
      </li>
      @endforeach
      @endif

     
      
    </ul>
  </div>

  




              <div class="block bg-gray-50 text-sm font-medium text-gray-500 text-center px-4 py-4 hover:text-gray-700 sm:rounded-b-lg">
                @include("includes.pagination")
              </div>
            </div>
          </section>
  
     
        </div>
  
             <!-- Comments-->
             <section aria-labelledby="notes-title">
                <div class="bg-white shadow sm:rounded-lg sm:overflow-hidden">
                  <div class="divide-y divide-gray-200">
                    <div class="px-4 py-5 sm:px-6">
                      <h2 id="notes-title" class="text-lg font-medium text-gray-900">Create/Update Task</h2>
                    </div>
                   
                  </div>
                  <div class="bg-gray-50 px-4 py-6 sm:px-6">
                    <div class="flex space-x-3">
                      <div class="flex-shrink-0">
                        <!--<img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80" alt="">-->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 rounded-full" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>

                      </div>
                      <div class="min-w-0 flex-1 items-end">
                        <form name="frmTask" wire:submit.prevent="create">
                            @csrf
                          <input type="hidden" name="edit_id" id="edit_id" wire:modal.defer="edit_id" />
                          <div>
                            <label for="task" class="sr-only">Task</label>
                            <textarea id="task" wire:model.defer="task" name="task" rows="3" class="shadow-sm block w-full focus:ring-blue-500 focus:border-blue-500 sm:text-sm border-gray-300 rounded-md" placeholder="Add a note"></textarea>
                          </div>

                          <div class="my-2">
                            <input type="text" wire:model.defer="due_date" name="due_date" id="due_date"
                          readonly   onchange="this.dispatchEvent(new InputEvent('input'))"  autocomplete="off"  data-provide="datepicker" data-date-autoclose="true" 
                          data-date-format="yyyy/mm/dd" data-date-today-highlight="true" 
                          class="shadow-sm block w-full focus:ring-blue-500 focus:border-blue-500 sm:text-sm border-gray-300 rounded-md"
                         placeholder="Select date">

                          </div>

                          <div class="items-end">
                            <label for="due_time" class="sr-only">Due Time</label>
                            <div class="mt-2  w-full rounded-lg shadow-xl">
                                <div class="flex items-end self-end">
                                <select name="due_hours"  wire:model.defer="due_hours" id="due_hours" class="shadow-sm block w-20 focus:ring-blue-500 focus:border-blue-500 sm:text-sm border-gray-300 rounded-md">
                                    @for($i=1;$i<=24;$i++)
                                    <option value="{{ $i }}">{{ $i}}</option>
                                    @endfor
                                </select>
                                <span class="text-xl mr-1 mx-1">:</span>
                                <select name="due_minutes"  wire:model.defer="due_minutes" id="due_minutes" class="shadow-sm block w-20 focus:ring-blue-500 focus:border-blue-500 sm:text-sm border-gray-300 rounded-md self-end">
                                  @for($i=5;$i<=60;$i+=5)
                                  @php
                                     $i_txt = $i;
                                     if($i<10)
                                      $i_txt = '0'.$i;
                                  @endphp
                                  
                                  <option value="{{ $i }}">{{ $i_txt}}</option>
                                  @endfor
                                </select>
                                
                                </div>
                            </div>
                          </div>


                          <div class="mt-3 flex w-full justify-end">
                            <div>
                            <a href="#" class="group inline-flex items-start text-sm space-x-2 text-gray-500 hover:text-gray-900">
                            
                              
                            </a>
                          </div>
                            <div>
                            <button type="button" wire:click="resetForm()" class="inline-flex items-center justify-right px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Cancel
                              </button>
                            <button type="submit"  class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                              {{ $this->submit_text }}
                            </button>
                          </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </section>

        
      </div>
      <script type="text/javascript">
       initDueDatepicker();
    </script>
    </main>
    
    @include('includes.util')  
  </div>
