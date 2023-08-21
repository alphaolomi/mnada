<?php

namespace App\Payments;

use App\Enums\Attributes\Description;

/**
 * Represents the type of a payment card.
 */
enum CardType: string
{
  #[Description('American Express Card')]
  case AmericanExpress = "amex";

  #[Description('Discover Card')]
  case Discover = "discover";

  #[Description('Visa Card')]
  case Visa = "visa";

  #[Description('MasterCard Card')]
  case MasterCard = "mastercard";
}
