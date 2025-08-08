@props(['project'])

<div x-data="{
        suggestions: [],
        openSugg: false,
        search(event) {
            let query = event.target.value.trim()

            if(query.length === 0) {
                this.suggestions = []
                this.openSugg = false
                return
            }
            {{-- send the request --}}
            axios.get(`/users/search?q=${query}`)
            .then((res) => {
                this.suggestions = res.data.suggestions
                this.openSugg = true
            })
            .catch(errs => console.log(errs))
        }
    }" 
    class="dark:text-gray-200"
>
    {{-- add user --}}
    <div class="py-4 md:py-5">
        <x-primary-button x-on:click="$dispatch('open-modal', 'add-user')" class="w-44 ml-[64px] md:ml-6 shadow-sm">
            Add User
        </x-primary-button>
    </div>

    {{-- modal --}}
    <x-modal name="add-user" :show="false" focusable>
        <div class="min-h-44 p-4 md:p-6 dark:bg-neutral-900">

            <div class="flex flex-wrap gap-2 items-center">
                <h2 class="md:text-lg">Add User To </h2>
                <p class="p-1 px-2 bg-gray-200 rounded-md dark:bg-gray-700">{{ Str::words($project->title, 10) }}</p>
            </div>

            <div class="mt-6 space-y-4">
                {{-- search bar --}}
                <div>
                    <x-text-input @input.debounce.300ms="search" type="text" autocomplete="off" name="search-bar" placeholder="search for users" class="w-full max-w-2xl" />
                </div>
                {{-- results --}}
                <div x-show="openSugg" x-transition>
                    <template x-for="suggestion in suggestions" class="">
                        <div :key="suggestion.id" class="flex items-center px-2 py-1 text-gray-900 whitespace-nowrap dark:text-gray-100">
                            {{-- avatar --}}
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8 dark:text-gray-400">
                                <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                            </svg>
                            <div class="ps-3">
                                <div x-text="suggestion.name" class="font-semibold -mb-1"></div>
                                <div x-text="suggestion.email" class="font-normal text-gray-500 dark:text-gray-400">m@gmail.com</div>
                            </div>  
                            <a :href="`/add/user?project_id={{$project->id}}&user_id=${suggestion.id}`" class="ml-auto">
                                <x-secondary-button class="capitalize">
                                    add
                                </x-secondary-button>
                            </a>
                        </div>
                    </template>
                </div>
                {{-- no results --}}
                <template x-if="openSugg && suggestions.length === 0">
                    <div class="text-center">No Results</div>
                </template>
            </div>
        </div>
    </x-modal>
</div>