<div
    x-data="{
        errors: {},
        showErrors: false,
        title: '',
        description: '',
        start_date: '',
        deadline: '',
        submit() {
            axios.post(`/projects/create?title=${this.title}&description=${this.description}&start_date=${this.start_date}&deadline=${this.deadline}`)
            .then(res => {
                console.log(res)
                if(res.status == 200) {
                    window.location.reload();
                }
            })
            .catch(errs => {
                this.errors = errs.response.data.errors
                this.showErrors = true
                console.log(errs)
            })
        }
    }"
>
    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'create-project')"
        class="h-full min-h-44 w-full flex items-center justify-center transition-all text-neutral-400 hover:text-neutral-900 hover:bg-gray-200 border border-dashed border-neutral-500 rounded-xl dark:hover:text-neutral-50 dark:bg-neutral-800 dark:hover:bg-neutral-700"
    >
        <div class="flex flex-col items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 block">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            <p>Create New Project</p>
        </div>
    </button>

    <x-modal name="create-project" :show="false" focusable>
        <form @submit.prevent method="POST" class="p-6 dark:bg-neutral-900">
            @csrf

            <h2 class="md:text-lg">{{__('Create New Project')}}</h2>

            <div class="mt-6 space-y-4">
                {{-- title --}}
                <div>
                    <x-input-label value="{{__('Title')}}" :required="true" />
                    <x-text-input type="text" name="title" x-model="title" class="w-full max-w-2xl" />
                </div>

                {{-- description --}}
                <div>
                    <x-input-label value="{{__('Description')}}" :required="true" />
                    <x-textarea-input name="description" x-model="description" class="w-full max-w-2xl" />
                </div>

                <div class="flex flex-col md:flex-row gap-6">
                    {{-- start_date --}}
                    <div class="w-full">
                        <x-input-label value="{{__('Start Date')}}" />
                        <x-date-input name="start_date" x-model="start_date" class="w-full" />
                    </div>
                    {{-- deadline --}}
                    <div class="w-full">
                        <x-input-label value="{{__('Deadline')}}" />
                        <x-date-input name="deadline" x-model="deadline" class="w-full" />
                    </div>
                </div>

                {{-- show errors --}}
                <div x-show="showErrors" x-transition class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <svg class="shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Danger</span>
                    <div>
                        <span class="font-medium">Ensure that these requirements are met:</span>
                        <ul class="mt-1.5 list-disc list-inside">
                            <template x-for="error in errors">
                                <li x-text="error"></li>
                            </template>
                        </ul>
                    </div>
                </div>

                {{-- buttons --}}
                <div class="flex gap-4 md:justify-end">
                    {{-- cancel --}}
                    <x-secondary-button class="w-32" x-on:click="$dispatch('close')" >
                        {{__('Cancel')}}
                    </x-secondary-button>
                    {{-- submit --}}
                    <x-primary-button class="w-32" x-on:click="submit()">
                        {{__('Submit')}}
                    </x-primary-button>
                </div>
            </div>
        </form>
    </x-modal>
</div>