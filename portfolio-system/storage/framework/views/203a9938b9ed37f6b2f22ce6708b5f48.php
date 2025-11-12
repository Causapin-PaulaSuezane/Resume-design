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
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Profile
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12" style="background: linear-gradient(135deg, #E8F4FD 0%, #B3E0FF 100%); min-height: 100vh;">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="p-8">
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold text-gray-800">Edit Your Profile</h3>
                        <p class="text-gray-600 mt-1">Update your professional information</p>
                    </div>

                    <?php if($errors->any()): ?>
                        <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded">
                            <p class="font-bold text-red-800 mb-2">Please fix these errors:</p>
                            <ul class="list-disc list-inside text-red-700 text-sm">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?php echo e(route('profile.update')); ?>" class="space-y-8" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>

                        <!-- Personal Information -->
                        <div class="border-b border-gray-200 pb-8">
                            <h4 class="text-lg font-bold text-gray-800 mb-5">Personal Information</h4>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Name *</label>
                                    <input type="text" name="name" value="<?php echo e(old('name', $user->name)); ?>"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                           required>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Email *</label>
                                    <input type="email" name="email" value="<?php echo e(old('email', $user->email)); ?>"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                           required>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Phone</label>
                                    <input type="text" name="phone" value="<?php echo e(old('phone', $user->phone)); ?>"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                           placeholder="+63 945 6199 708">
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">GitHub</label>
                                    <input type="text" name="github" value="<?php echo e(old('github', $user->github)); ?>"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                           placeholder="github.com/username">
                                </div>
                            </div>

                            <div class="mt-6">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Address</label>
                                <input type="text" name="address" value="<?php echo e(old('address', $user->address)); ?>"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                       placeholder="City, Province, Country">
                            </div>

                            <div class="mt-6">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">About Me</label>
                                <textarea name="about_me" rows="4"
                                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                          placeholder="Tell us about yourself..."><?php echo e(old('about_me', $user->about_me)); ?></textarea>
                            </div>
                        </div>

                        <!-- Profile Image -->
                        <div class="mt-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Profile Image</label>

                            <?php if($user->profile_image): ?>
                                <div class="mb-4">
                                    <img src="<?php echo e(asset($user->profile_image)); ?>" alt="Current Profile" class="w-32 h-32 rounded-full object-cover border-4 border-blue-200">
                                    <p class="text-sm text-gray-600 mt-2">Current profile image</p>
                                </div>
                            <?php endif; ?>

                            <input type="file" name="profile_image" accept="image/*"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <p class="text-xs text-gray-500 mt-1">Max size: 2MB. Formats: JPG, PNG, GIF</p>
                        </div>

                        <!-- Skills -->
                        <div class="border-b border-gray-200 pb-8">
                            <h4 class="text-lg font-bold text-gray-800 mb-5">Skills</h4>

                            <div id="skills-container" class="space-y-3">
                                <?php if($user->skills && count($user->skills) > 0): ?>
                                    <?php $__currentLoopData = $user->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="flex gap-3 skill-row">
                                            <input type="text" name="skill_name[]" placeholder="Skill name"
                                                   value="<?php echo e($skill['name']); ?>"
                                                   class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                                            <input type="number" name="skill_level[]" placeholder="Level"
                                                   value="<?php echo e($skill['level']); ?>" min="0" max="100"
                                                   class="w-28 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                                            <button type="button" onclick="this.parentElement.remove()"
                                                    class="px-4 py-3 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                                                Remove
                                            </button>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <div class="flex gap-3 skill-row">
                                        <input type="text" name="skill_name[]" placeholder="Skill name"
                                               class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                                        <input type="number" name="skill_level[]" placeholder="Level" min="0" max="100"
                                               class="w-28 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                                        <button type="button" onclick="this.parentElement.remove()"
                                                class="px-4 py-3 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                                            Remove
                                        </button>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <button type="button" onclick="addSkill()"
                                    class="mt-4 px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition font-semibold">
                                Add Skill
                            </button>
                        </div>

                        <!-- Education -->
                        <div class="border-b border-gray-200 pb-8">
                            <h4 class="text-lg font-bold text-gray-800 mb-5">Education</h4>

                            <div id="education-container" class="space-y-4">
                                <?php if($user->education && count($user->education) > 0): ?>
                                    <?php $__currentLoopData = $user->education; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $edu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="education-row p-4 border-2 border-gray-200 rounded-lg bg-gray-50">
                                            <input type="text" name="edu_program[]" placeholder="Program"
                                                   value="<?php echo e($edu['program']); ?>"
                                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg mb-3 focus:ring-2 focus:ring-blue-500">
                                            <input type="text" name="edu_school[]" placeholder="School name"
                                                   value="<?php echo e($edu['school']); ?>"
                                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg mb-3 focus:ring-2 focus:ring-blue-500">
                                            <input type="text" name="edu_years[]" placeholder="Years"
                                                   value="<?php echo e($edu['years']); ?>"
                                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg mb-3 focus:ring-2 focus:ring-blue-500">
                                            <button type="button" onclick="this.parentElement.remove()"
                                                    class="w-full px-4 py-3 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                                                Remove Education
                                            </button>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <div class="education-row p-4 border-2 border-gray-200 rounded-lg bg-gray-50">
                                        <input type="text" name="edu_program[]" placeholder="Program"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg mb-3 focus:ring-2 focus:ring-blue-500">
                                        <input type="text" name="edu_school[]" placeholder="School name"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg mb-3 focus:ring-2 focus:ring-blue-500">
                                        <input type="text" name="edu_years[]" placeholder="Years"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg mb-3 focus:ring-2 focus:ring-blue-500">
                                        <button type="button" onclick="this.parentElement.remove()"
                                                class="w-full px-4 py-3 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                                            Remove Education
                                        </button>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <button type="button" onclick="addEducation()"
                                    class="mt-4 px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition font-semibold">
                                Add Education
                            </button>
                        </div>

                        <!-- Projects -->
                        <div class="border-b border-gray-200 pb-8">
                            <h4 class="text-lg font-bold text-gray-800 mb-5">Projects</h4>

                            <div id="projects-container" class="space-y-4">
                                <?php if($user->projects && count($user->projects) > 0): ?>
                                    <?php $__currentLoopData = $user->projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="project-row p-4 border-2 border-gray-200 rounded-lg bg-gray-50">
                                            <input type="text" name="project_name[]" placeholder="Project Name"
                                                   value="<?php echo e($project['name']); ?>"
                                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg mb-3 focus:ring-2 focus:ring-blue-500">
                                            <textarea name="project_description[]" placeholder="Description" rows="2"
                                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg mb-3 focus:ring-2 focus:ring-blue-500"><?php echo e($project['description']); ?></textarea>
                                            <input type="url" name="project_link[]" placeholder="Project Link (optional)"
                                                   value="<?php echo e($project['link']); ?>"
                                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg mb-3 focus:ring-2 focus:ring-blue-500">
                                            <button type="button" onclick="this.parentElement.remove()"
                                                    class="w-full px-4 py-3 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                                                Remove Project
                                            </button>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <div class="project-row p-4 border-2 border-gray-200 rounded-lg bg-gray-50">
                                        <input type="text" name="project_name[]" placeholder="Project Name"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg mb-3 focus:ring-2 focus:ring-blue-500">
                                        <textarea name="project_description[]" placeholder="Description" rows="2"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg mb-3 focus:ring-2 focus:ring-blue-500"></textarea>
                                        <input type="url" name="project_link[]" placeholder="Project Link (optional)"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg mb-3 focus:ring-2 focus:ring-blue-500">
                                        <button type="button" onclick="this.parentElement.remove()"
                                                class="w-full px-4 py-3 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                                            Remove Project
                                        </button>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <button type="button" onclick="addProject()"
                                    class="mt-4 px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition font-semibold">
                                Add Project
                            </button>
                        </div>

                        <!-- Submit Buttons -->
                        <div class="flex gap-4 justify-end pt-4">
                            <a href="<?php echo e(route('dashboard')); ?>"
                               class="px-8 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition font-semibold">
                                Cancel
                            </a>
                            <button type="submit"
                                    class="px-8 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition font-semibold shadow-md">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        let skillIndex = <?php echo e($user->skills ? count($user->skills) : 1); ?>;
        let eduIndex = <?php echo e($user->education ? count($user->education) : 1); ?>;
        let projectIndex = <?php echo e($user->projects ? count($user->projects) : 1); ?>;

        function addSkill() {
            const container = document.getElementById('skills-container');
            const div = document.createElement('div');
            div.className = 'flex gap-3 skill-row';
            div.innerHTML = `
                <input type="text" name="skill_name[]" placeholder="Skill name"
                       class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                <input type="number" name="skill_level[]" placeholder="Level" min="0" max="100"
                       class="w-28 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                <button type="button" onclick="this.parentElement.remove()"
                        class="px-4 py-3 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                    Remove
                </button>
            `;
            container.appendChild(div);
            skillIndex++;
        }

        function addEducation() {
            const container = document.getElementById('education-container');
            const div = document.createElement('div');
            div.className = 'education-row p-4 border-2 border-gray-200 rounded-lg bg-gray-50';
            div.innerHTML = `
                <input type="text" name="edu_program[]" placeholder="Program"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg mb-3 focus:ring-2 focus:ring-blue-500">
                <input type="text" name="edu_school[]" placeholder="School name"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg mb-3 focus:ring-2 focus:ring-blue-500">
                <input type="text" name="edu_years[]" placeholder="Years"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg mb-3 focus:ring-2 focus:ring-blue-500">
                <button type="button" onclick="this.parentElement.remove()"
                        class="w-full px-4 py-3 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                    Remove Education
                </button>
            `;
            container.appendChild(div);
            eduIndex++;
        }

        function addProject() {
            const container = document.getElementById('projects-container');
            const div = document.createElement('div');
            div.className = 'project-row p-4 border-2 border-gray-200 rounded-lg bg-gray-50';
            div.innerHTML = `
                <input type="text" name="project_name[]" placeholder="Project Name"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg mb-3 focus:ring-2 focus:ring-blue-500">
                <textarea name="project_description[]" placeholder="Description" rows="2"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg mb-3 focus:ring-2 focus:ring-blue-500"></textarea>
                <input type="url" name="project_link[]" placeholder="Project Link (optional)"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg mb-3 focus:ring-2 focus:ring-blue-500">
                <button type="button" onclick="this.parentElement.remove()"
                        class="w-full px-4 py-3 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                    Remove Project
                </button>
            `;
            container.appendChild(div);
            projectIndex++;
        }
    </script>
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
<?php /**PATH D:\Resume source code\portfolio-system\resources\views/profile/edit.blade.php ENDPATH**/ ?>