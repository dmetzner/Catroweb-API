<?php
/**
 * MediaLibraryApiInterface
 * PHP version 5.
 *
 * @category Class
 *
 * @author   OpenAPI Generator team
 *
 * @see     https://github.com/openapitools/openapi-generator
 */

/**
 * Catroweb API.
 *
 * API for the Catrobat Share Platform
 *
 * The version of the OpenAPI document: v1.0.27
 * Contact: webmaster@catrobat.org
 * Generated by: https://github.com/openapitools/openapi-generator.git
 */

/**
 * NOTE: This class is auto generated by the openapi generator program.
 * https://github.com/openapitools/openapi-generator
 * Do not edit the class manually.
 */

namespace OpenAPI\Server\Api;

use OpenAPI\Server\Model\Package;

/**
 * MediaLibraryApiInterface Interface Doc Comment.
 *
 * @category Interface
 *
 * @author   OpenAPI Generator team
 *
 * @see     https://github.com/openapitools/openapi-generator
 */
interface MediaLibraryApiInterface
{
  /**
   * Operation mediaPackagePackageNameGet.
   *
   * Get media-library asstes of a named package
   *
   * @param string $package_name    Name of the package (required)
   * @param int    $responseCode    The HTTP response code to return
   * @param array  $responseHeaders Additional HTTP headers to return with the response ()
   *
   * @return OpenAPI\Server\Model\Package[]
   */
  public function mediaPackagePackageNameGet(string $package_name, &$responseCode, array &$responseHeaders);
}
