<?php

use App\Http\Controllers\Handle\VkController;

Route::post('vk', [VkController::class, 'index']);