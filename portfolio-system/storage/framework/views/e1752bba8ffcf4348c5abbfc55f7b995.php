<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
            <div class="flex gap-3">
                <a href="<?php echo e(route('profile.edit')); ?>" class="px-5 py-2.5 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition text-sm font-semibold shadow-sm">
                    Edit Profile
                </a>
                <a href="<?php echo e(route('resume.public', $user->id)); ?>" target="_blank" class="px-5 py-2.5 bg-white text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-50 transition text-sm font-semibold shadow-sm">
                    View Public Resume
                </a>
            </div>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="py-12" style="background: linear-gradient(135deg, #E8F4FD 0%, #B3E0FF 100%); min-height: 100vh;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <?php if(session('success')): ?>
                <div class="mb-6 bg-white border-l-4 border-green-500 p-4 rounded-lg shadow-sm">
                    <p class="text-sm font-medium text-green-800"><?php echo e(session('success')); ?></p>
                </div>
            <?php endif; ?>

            <!-- Welcome Section -->
            <div class="bg-white rounded-xl shadow-md p-8 mb-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-5">
                        <div class="w-20 h-20 rounded-full shadow-lg overflow-hidden border-4 border-blue-200">
                            <?php if($user->profile_image): ?>
                                <img src="<?php echo e(asset($user->profile_image)); ?>" alt="<?php echo e($user->name); ?>" class="w-full h-full object-cover">
                            <?php else: ?>
                                <div class="w-full h-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center text-white text-2xl font-bold">
                                    <?php echo e(strtoupper(substr($user->name, 0, 2))); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <div>
                            <h1 class="text-3xl font-bold text-gray-800">Welcome, <?php echo e($user->name); ?></h1>
                            <p class="text-gray-600 mt-1">Manage your professional profile</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-blue-400">
                    <p class="text-gray-600 text-sm font-semibold uppercase tracking-wider">Skills</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2"><?php echo e($user->skills ? count($user->skills) : 0); ?></p>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-teal-400">
                    <p class="text-gray-600 text-sm font-semibold uppercase tracking-wider">Education</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2"><?php echo e($user->education ? count($user->education) : 0); ?></p>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-indigo-400">
                    <p class="text-gray-600 text-sm font-semibold uppercase tracking-wider">Projects</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2"><?php echo e($user->projects ? count($user->projects) : 0); ?></p>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-pink-400">
                    <p class="text-gray-600 text-sm font-semibold uppercase tracking-wider">Completion</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2"><?php echo e($user->about_me ? '100' : '75'); ?>%</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Contact Information -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4 pb-3 border-b border-gray-200">Contact Information</h3>
                    <div class="space-y-3">
                        <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                            <span class="w-24 text-sm font-semibold text-gray-600">Email</span>
                            <span class="text-gray-800"><?php echo e($user->email); ?></span>
                        </div>
                        <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                            <span class="w-24 text-sm font-semibold text-gray-600">Phone</span>
                            <span class="text-gray-800"><?php echo e($user->phone ?? 'Not set'); ?></span>
                        </div>
                        <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                            <span class="w-24 text-sm font-semibold text-gray-600">Address</span>
                            <span class="text-gray-800"><?php echo e($user->address ?? 'Not set'); ?></span>
                        </div>
                        <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                            <span class="w-24 text-sm font-semibold text-gray-600">GitHub</span>
                            <span class="text-gray-800"><?php echo e($user->github ?? 'Not set'); ?></span>
                        </div>
                    </div>
                </div>

                <!-- About Me -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4 pb-3 border-b border-gray-200">About Me</h3>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-gray-700 leading-relaxed">
                            <?php echo e($user->about_me ?? 'Add information about yourself in the edit section.'); ?>

                        </p>
                    </div>
                </div>

                <!-- Skills -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4 pb-3 border-b border-gray-200">Skills</h3>
                    <?php if($user->skills && count($user->skills) > 0): ?>
                        <div class="space-y-4">
                            <?php $__currentLoopData = $user->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div>
                                    <div class="flex justify-between mb-2">
                                        <span class="text-sm font-semibold text-gray-700"><?php echo e($skill['name']); ?></span>
                                        <span class="text-sm font-semibold text-blue-600"><?php echo e($skill['level']); ?>%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2 overflow-hidden">
                                        <div class="bg-gradient-to-r from-blue-400 to-blue-600 h-2 rounded-full transition-all duration-1000" style="width: <?php echo e($skill['level']); ?>%"></div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php else: ?>
                        <div class="text-center py-8 bg-gray-50 rounded-lg">
                            <p class="text-gray-500 text-sm">No skills added yet</p>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Education -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4 pb-3 border-b border-gray-200">Education</h3>
                    <?php if($user->education && count($user->education) > 0): ?>
                        <div class="space-y-4">
                            <?php $__currentLoopData = $user->education; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $edu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="p-4 bg-gray-50 rounded-lg border-l-4 border-blue-400">
                                    <h4 class="font-bold text-gray-800 text-sm"><?php echo e($edu['program']); ?></h4>
                                    <p class="text-sm text-gray-600 mt-1"><?php echo e($edu['school']); ?></p>
                                    <p class="text-xs text-gray-500 mt-1"><?php echo e($edu['years']); ?></p>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php else: ?>
                        <div class="text-center py-8 bg-gray-50 rounded-lg">
                            <p class="text-gray-500 text-sm">No education added yet</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Projects Section -->
            <?php if($user->projects && count($user->projects) > 0): ?>
                <div class="mt-6 bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-6 pb-3 border-b border-gray-200">Projects</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php $__currentLoopData = $user->projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="border border-gray-200 rounded-lg p-5 hover:border-blue-400 hover:shadow-md transition-all">
                                <h4 class="text-base font-bold text-gray-800 mb-2"><?php echo e($project['name']); ?></h4>
                                <p class="text-gray-600 text-sm mb-3 line-clamp-2"><?php echo e($project['description']); ?></p>
                                <?php if(!empty($project['link'])): ?>
                                    <a href="<?php echo e($project['link']); ?>" target="_blank" class="text-blue-600 hover:text-blue-800 text-sm font-semibold">
                                        View Project →
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH D:\Resume source code\portfolio-system\resources\views/dashboard.blade.php ENDPATH**/ ?>