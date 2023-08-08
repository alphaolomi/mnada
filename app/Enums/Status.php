<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
 

enum Status: string implements HasLabel
{
    case Active = 'active';
    case Inactive = 'inactive';
    case Pending = 'pending';
    case Draft = 'draft';
    case Published = 'published';
    case Unpublished = 'unpublished';
    case Deleted = 'deleted';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Active => 'Active',
            self::Inactive => 'Inactive',
            self::Pending => 'Pending',
            self::Draft => 'Draft',
            self::Published => 'Published',
            self::Unpublished => 'Unpublished',
            self::Deleted => 'Deleted',
        };
    }
}
