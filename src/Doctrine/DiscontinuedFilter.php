<?php

namespace App\Doctrine;

use App\Entity\FortuneCookie;
use Doctrine\ORM\Query\Filter\SQLFilter;
use Doctrine\ORM\Mapping\ClassMetadata;  // <-- to trzeba dodać

class DiscontinuedFilter extends SQLFilter
{
    public function addFilterConstraint(ClassMetadata $targetEntity, $targetTableAlias): string
    {
        if($targetEntity->name !== FortuneCookie::class){
            return '';
        }
        return sprintf('%s.discontinued = %s', $targetTableAlias, $this->getParameter('discontinued'));

    }
}