<?php

declare(strict_types=1);

namespace App\Enums;

use App\Enums\Attributes\Description;
use Filament\Support\Contracts\HasLabel;

enum Status: string implements HasLabel
{
    #[Description('Active')]
    case Active      = 'active';

    #[Description('Inactive')]
    case Inactive    = 'inactive';

    #[Description('Pending')]
    case Pending     = 'pending';

    #[Description('Draft')]
    case Draft       = 'draft';

    #[Description('Published')]
    case Published   = 'published';

    #[Description('Unpublished')]
    case Unpublished = 'unpublished';

    #[Description('Deleted')]
    case Deleted     = 'deleted';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Active      => 'Active',
            self::Inactive    => 'Inactive',
            self::Pending     => 'Pending',
            self::Draft       => 'Draft',
            self::Published   => 'Published',
            self::Unpublished => 'Unpublished',
            self::Deleted     => 'Deleted',
        };
    }
}
