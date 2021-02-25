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
                  History List 
                </h2>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                  User History details
                </p>
              </div>
             

              <!-- This example requires Tailwind CSS v2.0+ -->
<div class="bg-white shadow overflow-hidden sm:rounded-md">
  



<!-- This example requires Tailwind CSS v2.0+ -->
<div class="bg-white shadow overflow-hidden sm:rounded-md">
    <ul class="divide-y divide-gray-200">
        @if(isset($data))  
        @foreach($data as $row) 
      <li wire:click="editForm({{ $row->id }})">
        <a href="#" class="block hover:bg-gray-50">
          <div class="px-4 py-4 sm:px-6">
            <div class="flex items-center justify-between">
              <p class="text-sm font-medium text-indigo-600 truncate">
                {{ $row->title }}
              </p>
              <div class="ml-2 flex-shrink-0 flex">
                <p class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    {{ $row->status }}
                </p>
              </div>
            </div>
            <div class="mt-2 sm:flex sm:justify-between">
              <div class="sm:flex">
                <p class="flex items-center text-sm text-gray-500">
                  <!-- Heroicon name: solid/users -->
                  <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                  </svg>
                  {{ $row->description }}
                </p>
                
              </div>
              <div class="mt-2 flex w-52 items-center text-sm text-gray-500 sm:mt-0">
                <!-- Heroicon name: solid/calendar -->
                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                </svg>
                <p class="text-gray-400 text-xs">
                  On Event <br>
                  <time  datetime="2020-01-07">{{ date("d M, Y",strtotime($row->event_date)) }}</time>
                </p>
              </div>
            </div>
          </div>
        </a>
      </li>
      @endforeach
      @endif
      
    </ul>
  </div>
  






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
                      <h2 id="notes-title" class="text-lg font-medium text-gray-900">Create/Update History</h2>
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
                        <form name="frmHistory" wire:submit.prevent="create">
                            @csrf
                          <input type="hidden" name="edit_id" id="edit_id" wire:modal.defer="edit_id" />
                          <div>
                            <label for="title" class="sr-only">Title</label>
                            <input type="text" id="title" wire:model.defer="title" name="title" rows="3" class="shadow-sm block w-full focus:ring-blue-500 focus:border-blue-500 sm:text-sm border-gray-300 rounded-md" placeholder="Add a title"/>
                          </div>
                          <div class="my-2">
                            <label for="description" class="sr-only">Task</label>
                            <textarea id="description" wire:model.defer="description" name="description" rows="5" class="shadow-sm block w-full focus:ring-blue-500 focus:border-blue-500 sm:text-sm border-gray-300 rounded-md" placeholder="Add a history"></textarea>
                          </div>

                          <div class="my-2">
                            <input type="text" wire:model.defer="event_date" name="event_date" id="event_date"
                          readonly   onchange="this.dispatchEvent(new InputEvent('input'))"  autocomplete="off"  data-provide="datepicker" data-date-autoclose="true" 
                          data-date-format="yyyy/mm/dd" data-date-today-highlight="true" 
                          class="shadow-sm block w-full focus:ring-blue-500 focus:border-blue-500 sm:text-sm border-gray-300 rounded-md"
                         placeholder="Select date">
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
       initEventDatepicker();
    </script>
    </main>
    
    @include('includes.util')  
  </div>
