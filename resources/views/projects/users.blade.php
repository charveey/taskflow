
<div class="flex">
    <!-- Navigation -->
    <x-navigation :project='$project'/>
    
    <x-app-layout>

        {{-- header --}}
        <x-slot name="header">
            <div class="flex items-center ml-[56px] md:ml-0">
                {{-- toggle nav --}}
                <x-toggle-nav style="mr-2 py-1.5"/>
                {{ __('Users') }}
            </div>
        </x-slot>

        {{-- add user (if auth is admin) --}}
        @if( auth()->user()->getAuthority($project->id) == 'admin' )
            <x-add-user :project='$project' />
        @endif

        {{-- status --}}
        @if(session()->has('status'))
            <div class="flex items-center p-4 mb-4 mx-3 md:mx-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Success!</span> {{ session('status') }}
                </div>
            </div>
        @endif
        {{-- error --}}
        @if(session()->has('error'))
            <div class="flex items-center p-4 mb-4 mx-3 md:mx-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Alert!</span> {{ session('error') }}
                </div>
            </div>
        @endif

        <div x-data="" class="ml-[56px] md:ml-0 shadow-sm overflow-x-auto dark:text-gray-100">
    
            <table class="md:w-full text-sm text-left rtl:text-right border-y text-gray-500 dark:text-gray-400 dark:border-y-gray-700">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-neutral-900 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-4 py-3">
                            Join Date
                        </th>
                        <th scope="col" class="px-4 py-3">
                            Authority
                        </th>
                        <th scope="col" class="px-4 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($project->users as $user)
                        <tr class="bg-white border-b dark:bg-neutral-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700">
                            <th scope="row" class="flex items-center px-4 py-3 text-gray-900 whitespace-nowrap dark:text-white">
                                {{-- avatar --}}
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-9 dark:text-gray-400">
                                <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                                </svg>
                                {{-- name & email --}}
                                <div class="ps-3">
                                    <div class="text-base font-semibold">{{ $user->name }}</div>
                                    <div class="font-normal text-gray-500">{{ $user->email }}</div>
                                </div>  
                            </th>
                            <td class="px-4 py-3 whitespace-nowrap">
                                {{ $user->pivot->created_at->format('Y M d') }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center capitalize">
                                    {{ $user->pivot->authority }} 
                                </div>
                            </td>
                            {{-- remove user (if auth is admin) --}}
                            <td class="px-4 py-3">
                                @if(auth()->user()->id != $user->id && auth()->user()->getAuthority($project->id) == 'admin')
                                    <button x-on:click="$dispatch('open-modal', 'remove-user-{{$user->id}}')" class="font-medium text-red-600 dark:text-red-500 hover:underline">remove</button>
                                @else
                                    <span>-</span>
                                @endif
                            </td>
                        </tr>
                        <x-modal name="remove-user-{{$user->id}}" :show="false" focusable maxWidth="sm">
                            <div class="flex flex-col gap-2 p-4 md:p-6 dark:bg-neutral-900">
                                <p>You are about to remove <b>{{ $user->name }}</b> from <b>{{ $project->title }}</b></p>
                                <form action="{{ route('projects.removeuser', ['project' => $project, 'user' => $user]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <div class="w-fit ml-auto">
                                        <x-secondary-button x-on:click="$dispatch('close-modal', 'remove-user-{{$user->id}}')" class="capitalize">
                                            cancel
                                        </x-secondary-button>
                                        <x-danger-button class="capitalize">
                                            remove
                                        </x-danger-button>
                                    </div>
                                </form>
                            </div>
                        </x-modal>
                    @endforeach
                </tbody>
            </table>

        </div>
    </x-app-layout>
</div>
