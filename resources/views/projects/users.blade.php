
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
    
        {{-- add user --}}
        <div class="py-4 md:py-5">
            <a href="{{ route('projects.users', $project) }}" class="block">
                <x-primary-button class="w-44 ml-[64px] md:ml-6 shadow-sm">
                    Add User
                </x-primary-button>
            </a>
        </div>

        <div class="ml-[56px] md:ml-0 shadow-sm overflow-x-auto dark:text-gray-100">
    
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
                            <td class="px-4 py-3">
                                <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">remove</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </x-app-layout>
</div>
