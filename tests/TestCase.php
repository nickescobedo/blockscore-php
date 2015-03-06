<?php

namespace BlockScore;

/**
 * Base class for BlockScore test cases.
 */
class TestCase extends \PHPUnit_Framework_TestCase
{
  const API_KEY = null;
  private static $first_names = array(
    'Jane',
    'John',
    'Alain',
    'John',
    'Chris',
    'Beau',
    'Andrew',
    'Connor',
    'Daniel',
  );
  protected static $test_person = array(
    'name_first' => 'Jane',
    'name_last' => 'Doe',
    'birth_day' => 1,
    'birth_month' => 1,
    'birth_year' => 1990,
    'document_type' => 'ssn',
    'document_value' => '0000',
    'address_street1' => '123 Something Ave',
    'address_city' => 'Newton Falls',
    'address_subdivision' => 'OH',
    'address_postal_code' => '44444',
    'address_country_code' => 'US',
  );
  protected $test_company = array(
    'name' => 'Test Company',
    'tax_id' => '0000',
    'incorporation_day' => 1,
    'incorporation_month' => 1,
    'incorporation_year' => 1990,
    'address_street1' => '123 Something Ave',
    'address_city' => 'Newton Falls',
    'address_subdivision' => 'OH',
    'address_postal_code' => '44444',
    'address_country_code' => 'US',
  );

  protected static function setTestApiKey()
  {
    if (self::API_KEY == null) {
      BlockScore::setApiKey(getenv('BLOCKSCORE_API_KEY'));
    }
    else {
      BlockScore::setApiKey(self::API_KEY);
    }
  }

  protected static function createTestPerson()
  {
    self::setTestApiKey();
    self::randomizeFirstName();
    return Person::create(self::$test_person);
  }

  protected static function createTestCandidate()
  {
    self::setTestApiKey();
    self::randomizeFirstName();
    return Candidate::create($this->test_person);
  }

  protected static function createTestCompany()
  {
    self::setTestApiKey();
    return Company::create($this->test_company);
  }

  protected static function randomizeFirstName()
  {
    $new_first_name = self::$first_names[array_rand(self::$first_names)];
    self::$test_person['name_first'] = $new_first_name;
  }
}