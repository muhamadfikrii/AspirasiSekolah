<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Aspiration Details</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    <div class="min-h-screen py-8 px-4">
        <div class="max-w-6xl mx-auto">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Student Aspiration Details</h1>
                <p class="text-gray-600 mt-2">View detailed information about student aspirations and admin feedback</p>
            </div>

            <!-- Student Information Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8 border border-gray-100">
                <div class="px-6 py-4 bg-gradient-to-r from-blue-600 to-indigo-700">
                    <h2 class="text-xl font-semibold text-white">Student Information</h2>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="space-y-2">
                            <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Name</p>
                            <p class="text-lg font-semibold text-gray-900 bg-gray-50 p-3 rounded-lg border border-gray-200">
                                {{ $aspirations->students->user->name ?? 'N/A' }}
                            </p>
                        </div>
                        
                        <div class="space-y-2">
                            <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Class</p>
                            <p class="text-lg font-semibold text-gray-900 bg-gray-50 p-3 rounded-lg border border-gray-200">
                                {{ $aspirations->students->class ?? 'N/A' }}
                            </p>
                        </div>
                        
                        <div class="space-y-2">
                            <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Location</p>
                            <p class="text-lg font-semibold text-gray-900 bg-gray-50 p-3 rounded-lg border border-gray-200">
                                {{ $aspirations->location ?? 'N/A' }}
                            </p>
                        </div>
                        
                        <div class="space-y-2">
                            <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Status</p>
                            <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium bg-blue-100 text-blue-800 border border-blue-200">
                                {{ $aspirations->status ?? 'Pending' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Description Section -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8 border border-gray-100">
                <div class="px-6 py-4 bg-gradient-to-r from-gray-700 to-gray-800">
                    <h2 class="text-xl font-semibold text-white">Aspiration Description</h2>
                </div>
                <div class="p-6">
                    <div class="space-y-2">
                        <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Detailed Description</p>
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 min-h-[120px]">
                            <p class="text-gray-800 leading-relaxed whitespace-pre-wrap">
                                {{ $aspirations->description ?? 'No description provided' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Admin Feedback Section -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
                <div class="px-6 py-4 bg-gradient-to-r from-emerald-600 to-teal-700">
                    <div class="flex justify-between items-center">
                        <h2 class="text-xl font-semibold text-white">Admin Feedback</h2>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-white/20 text-white border border-white/30">
                            {{ $aspirations->feedback ? 'Responded' : 'Awaiting Response' }}
                        </span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="space-y-2">
                        <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Feedback Content</p>
                        <div class="bg-emerald-50 p-4 rounded-lg border border-emerald-200 min-h-[120px]">
                            <p class="text-gray-800 leading-relaxed whitespace-pre-wrap">
                                {{ $aspirations->feedback->content ?? 'No feedback has been provided by the admin yet.' }}
                            </p>
                        </div>
                    </div>
                    
                    @if($aspirations->feedback)
                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Responded By</p>
                                <p class="text-gray-900 font-medium">
                                    {{ $aspirations->feedback->admin->name ?? 'Administrator' }}
                                </p>
                            </div>
                            <div class="space-y-2">
                                <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Response Date</p>
                                <p class="text-gray-900 font-medium">
                                    {{ $aspirations->feedback->created_at->format('F j, Y, g:i A') ?? 'N/A' }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Back Button -->
            <div class="mt-8 flex justify-end">
                <a href="{{ route('student.index') }}" 
                   class="inline-flex items-center px-5 py-3 bg-gray-800 text-white font-medium rounded-lg hover:bg-gray-700 transition duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 shadow-sm">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Back to Dashboard
                </a>
            </div>
        </div>
    </div>
</body>
</html>