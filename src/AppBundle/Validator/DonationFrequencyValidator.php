<?php

namespace AppBundle\Validator;

use AppBundle\Donation\PayboxPaymentFrequency;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class DonationFrequencyValidator extends ConstraintValidator
{
    private $frequencies;

    public function __construct()
    {
        $this->frequencies = PayboxPaymentFrequency::DONATION_FREQUENCIES;
        $this->frequencies[] = 1;
    }

    public function validate($value, Constraint $constraint)
    {
        if (!in_array(intval($value), $this->frequencies)) {
            $this
                ->context
                ->buildViolation($constraint->message)
                ->addViolation();
        }
    }
}
