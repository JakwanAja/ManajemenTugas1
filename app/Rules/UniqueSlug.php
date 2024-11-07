<?php

namespace App\Rules;

use App\Models\Category; // Pastikan untuk mengimpor model yang tepat
use Illuminate\Contracts\Validation\Rule;

class UniqueSlug implements Rule
{
    public function passes($attribute, $value)
    {
        return !Category::where('slug', $value)->exists();
    }

    public function message()
    {
        return 'Slug kategori sudah digunakan. Silakan pilih yang lain.';
    }
}
