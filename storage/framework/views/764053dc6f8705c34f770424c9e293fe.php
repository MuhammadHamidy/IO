

<?php $__env->startSection('page-title', 'Partners Management'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Partners Management</h1>
            <p class="text-gray-600">Manage your partner organizations</p>
        </div>
        <a href="<?php echo e(route('admin.partners.create')); ?>" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Add Partner
        </a>
    </div>

    
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Partner</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Country / Region</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php $__empty_1 = true; $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <?php if($partner->logo): ?>
                                <img class="w-10 h-10 rounded-lg object-contain mr-3 bg-gray-50 p-1" src="<?php echo e(asset('storage/' . $partner->logo)); ?>" alt="<?php echo e($partner->name); ?>">
                                <?php else: ?>
                                <div class="w-10 h-10 bg-gray-200 rounded-lg mr-3 flex items-center justify-center">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                                <?php endif; ?>
                                <div>
                                    <div class="text-sm font-medium text-gray-900"><?php echo e($partner->name); ?></div>
                                    <?php if($partner->website): ?>
                                    <a href="<?php echo e($partner->website); ?>" target="_blank" class="text-sm text-blue-600 hover:text-blue-800 flex items-center">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                        </svg>
                                        Website
                                    </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <?php if($partner->category): ?>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                <?php if($partner->category === 'University'): ?> bg-blue-100 text-blue-800
                                <?php elseif($partner->category === 'Organization'): ?> bg-purple-100 text-purple-800
                                <?php elseif($partner->category === 'Embassy'): ?> bg-yellow-100 text-yellow-800
                                <?php elseif($partner->category === 'Government Agency'): ?> bg-red-100 text-red-800
                                <?php else: ?> bg-green-100 text-green-800
                                <?php endif; ?>
                            ">
                                <?php if($partner->category === 'University'): ?> 🎓
                                <?php elseif($partner->category === 'Organization'): ?> 🏢
                                <?php elseif($partner->category === 'Embassy'): ?> 🏛️
                                <?php elseif($partner->category === 'Government Agency'): ?> 🏛️
                                <?php else: ?> 💼
                                <?php endif; ?>
                                <?php echo e($partner->category); ?>

                            </span>
                            <?php else: ?>
                            <span class="text-sm text-gray-400">Not set</span>
                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <?php
                                $countries = include base_path('vendor/umpirsky/country-list/data/en/country.php');
                                $countryName = $partner->country ? ($countries[$partner->country] ?? $partner->country) : 'Not specified';
                            ?>
                            <div class="text-sm text-gray-900"><?php echo e($countryName); ?></div>
                            <?php if($partner->regional): ?>
                            <div class="text-xs text-gray-500"><?php echo e($partner->regional); ?></div>
                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full <?php echo e($partner->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800'); ?>">
                                <?php echo e(ucfirst($partner->status ?? 'draft')); ?>

                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <?php echo e($partner->created_at ? $partner->created_at->format('M d, Y') : 'Unknown'); ?>

                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex items-center space-x-2">
                                <a href="<?php echo e(route('admin.partners.edit', $partner->id)); ?>" class="text-blue-600 hover:text-blue-900">Edit</a>
                                <form method="POST" action="<?php echo e(route('admin.partners.destroy', $partner->id)); ?>" class="inline" onsubmit="return confirm('Are you sure you want to delete this partner?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                            <div class="flex flex-col items-center">
                                <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                <p class="text-lg font-medium">No partners found</p>
                                <p class="text-sm">Get started by adding your first partner.</p>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        
        <?php if($partners->hasPages()): ?>
        <div class="px-6 py-3 border-t border-gray-200">
            <?php echo e($partners->links()); ?>

        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('components.admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Kuliah\laragon\www\KP\IO-web\resources\views/admin/partners/index.blade.php ENDPATH**/ ?>