<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
            <div class="flex gap-3">
                <a href="{{ route('profile.edit') }}" class="px-5 py-2.5 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition text-sm font-semibold shadow-sm">
                    Edit Profile
                </a>
                <a href="{{ route('resume.public', $user->id) }}" target="_blank" class="px-5 py-2.5 bg-white text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-50 transition text-sm font-semibold shadow-sm">
                    View Public Resume
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12" style="background: linear-gradient(135deg, #E8F4FD 0%, #B3E0FF 100%); min-height: 100vh;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-6 bg-white border-l-4 border-green-500 p-4 rounded-lg shadow-sm">
                    <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                </div>
            @endif

            <!-- Welcome Section -->
            <div class="bg-white rounded-xl shadow-md p-8 mb-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-5">
                        <div class="w-20 h-20 rounded-full shadow-lg overflow-hidden border-4 border-blue-200">
                            @if($user->profile_image)
                                <img src="{{ asset($user->profile_image) }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center text-white text-2xl font-bold">
                                    {{ strtoupper(substr($user->name, 0, 2)) }}
                                </div>
                            @endif
                        </div>
                        
                        <div>
                            <h1 class="text-3xl font-bold text-gray-800">Welcome, {{ $user->name }}</h1>
                            <p class="text-gray-600 mt-1">Manage your professional profile</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-blue-400">
                    <p class="text-gray-600 text-sm font-semibold uppercase tracking-wider">Skills</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $user->skills ? count($user->skills) : 0 }}</p>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-teal-400">
                    <p class="text-gray-600 text-sm font-semibold uppercase tracking-wider">Education</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $user->education ? count($user->education) : 0 }}</p>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-indigo-400">
                    <p class="text-gray-600 text-sm font-semibold uppercase tracking-wider">Projects</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $user->projects ? count($user->projects) : 0 }}</p>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-pink-400">
                    <p class="text-gray-600 text-sm font-semibold uppercase tracking-wider">Completion</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $user->about_me ? '100' : '75' }}%</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Contact Information -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4 pb-3 border-b border-gray-200">Contact Information</h3>
                    <div class="space-y-3">
                        <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                            <span class="w-24 text-sm font-semibold text-gray-600">Email</span>
                            <span class="text-gray-800">{{ $user->email }}</span>
                        </div>
                        <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                            <span class="w-24 text-sm font-semibold text-gray-600">Phone</span>
                            <span class="text-gray-800">{{ $user->phone ?? 'Not set' }}</span>
                        </div>
                        <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                            <span class="w-24 text-sm font-semibold text-gray-600">Address</span>
                            <span class="text-gray-800">{{ $user->address ?? 'Not set' }}</span>
                        </div>
                        <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                            <span class="w-24 text-sm font-semibold text-gray-600">GitHub</span>
                            <span class="text-gray-800">{{ $user->github ?? 'Not set' }}</span>
                        </div>
                    </div>
                </div>

                <!-- About Me -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4 pb-3 border-b border-gray-200">About Me</h3>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-gray-700 leading-relaxed">
                            {{ $user->about_me ?? 'Add information about yourself in the edit section.' }}
                        </p>
                    </div>
                </div>

                <!-- Skills -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4 pb-3 border-b border-gray-200">Skills</h3>
                    @if($user->skills && count($user->skills) > 0)
                        <div class="space-y-4">
                            @foreach($user->skills as $skill)
                                <div>
                                    <div class="flex justify-between mb-2">
                                        <span class="text-sm font-semibold text-gray-700">{{ $skill['name'] }}</span>
                                        <span class="text-sm font-semibold text-blue-600">{{ $skill['level'] }}%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2 overflow-hidden">
                                        <div class="bg-gradient-to-r from-blue-400 to-blue-600 h-2 rounded-full transition-all duration-1000" style="width: {{ $skill['level'] }}%"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8 bg-gray-50 rounded-lg">
                            <p class="text-gray-500 text-sm">No skills added yet</p>
                        </div>
                    @endif
                </div>

                <!-- Education -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4 pb-3 border-b border-gray-200">Education</h3>
                    @if($user->education && count($user->education) > 0)
                        <div class="space-y-4">
                            @foreach($user->education as $edu)
                                <div class="p-4 bg-gray-50 rounded-lg border-l-4 border-blue-400">
                                    <h4 class="font-bold text-gray-800 text-sm">{{ $edu['program'] }}</h4>
                                    <p class="text-sm text-gray-600 mt-1">{{ $edu['school'] }}</p>
                                    <p class="text-xs text-gray-500 mt-1">{{ $edu['years'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8 bg-gray-50 rounded-lg">
                            <p class="text-gray-500 text-sm">No education added yet</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Projects Section -->
            @if($user->projects && count($user->projects) > 0)
                <div class="mt-6 bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-6 pb-3 border-b border-gray-200">Projects</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($user->projects as $project)
                            <div class="border border-gray-200 rounded-lg p-5 hover:border-blue-400 hover:shadow-md transition-all">
                                <h4 class="text-base font-bold text-gray-800 mb-2">{{ $project['name'] }}</h4>
                                <p class="text-gray-600 text-sm mb-3 line-clamp-2">{{ $project['description'] }}</p>
                                @if(!empty($project['link']))
                                    <a href="{{ $project['link'] }}" target="_blank" class="text-blue-600 hover:text-blue-800 text-sm font-semibold">
                                        View Project →
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
