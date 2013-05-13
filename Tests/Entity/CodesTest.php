<?php

/**
 * This file is part of the pantarei/oauth2 package.
 *
 * (c) Wong Hoi Sing Edison <hswong3i@pantarei-design.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pantarei\OAuth2\Tests\Entity;

use Pantarei\OAuth2\Database\Database;
use Pantarei\OAuth2\Entity\Codes;
use Pantarei\OAuth2\Tests\OAuth2WebTestCase;

/**
 * Test authorizes entity functionality.
 *
 * @author Wong Hoi Sing Edison <hswong3i@pantarei-design.com>
 */
class CodesTest extends OAuth2WebTestCase
{
  public function testAbstract()
  {
    $data = new Codes();
    $data->setId(1)
      ->setCode('f0c68d250bcc729eb780a235371a9a55')
      ->setClientId('http://democlient2.com/')
      ->setRedirectUri('http://democlient2.com/redirect_uri')
      ->setExpiresIn('300')
      ->setUsername('demouser2')
      ->setScope(array(
        'demoscope1',
        'demoscope2',
      ));
    $this->assertEquals(1, $data->getId());
    $this->assertEquals('f0c68d250bcc729eb780a235371a9a55', $data->getCode());
    $this->assertEquals('http://democlient2.com/', $data->getClientId());
    $this->assertEquals('http://democlient2.com/redirect_uri', $data->getRedirectUri());
    $this->assertEquals('300', $data->getExpiresIn());
    $this->assertEquals('demouser2', $data->getUsername());
    $this->assertEquals(array('demoscope1', 'demoscope2'), $data->getScope());
  }

  public function testFind()
  {
    $result = Database::find('Codes', 1);
    $this->assertEquals('Pantarei\\OAuth2\\Tests\\Entity\\Codes', get_class($result));
    $this->assertEquals(1, $result->getId());
    $this->assertEquals('f0c68d250bcc729eb780a235371a9a55', $result->getCode());
    $this->assertEquals('http://democlient2.com/', $result->getClientId());
    $this->assertEquals('http://democlient2.com/redirect_uri', $result->getRedirectUri());
    $this->assertEquals('300', $result->getExpiresIn());
    $this->assertEquals('demouser2', $result->getUsername());
    $this->assertEquals(array('demoscope1', 'demoscope2'), $result->getScope());
  }
}
