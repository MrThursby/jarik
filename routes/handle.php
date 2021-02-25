<?php

use App\Http\Controllers\Handle\VkController;

Route::get('vk', [VkController::class, 'index']);