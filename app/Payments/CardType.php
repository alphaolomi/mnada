<?php

namespace App\Payments;

enum CardType: string
{
  case AmericanExpress = "amex";
  case Visa = "visa";
  case MasterCard = "mastercard";
}