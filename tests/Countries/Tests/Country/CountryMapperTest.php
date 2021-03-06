<?php

namespace GeoBase\Countries\Tests\Country;

use GeoBase\Countries\Country\CountryEntity;
use GeoBase\Countries\Country\CountryLoader;
use GeoBase\Countries\Country\CountryMapper;
use PHPUnit\Framework\TestCase;

class CountryMapperTest extends TestCase
{
    public function testMapArrayToCollection()
    {
        $collection = (new CountryMapper())->mapArrayToCollection((new CountryLoader())->loadAllCountries());
        $this->assertGreaterThan(1, count($collection));
    }

    public function testMapArrayToEntity()
    {
        $countries = (new CountryLoader())->loadAllCountries();
        $entity = (new CountryMapper())->mapArrayToEntity($countries[0]);
        $this->assertInstanceOf(CountryEntity::class, $entity);
        $this->assertNotEmpty($entity->getCode());
    }
}
