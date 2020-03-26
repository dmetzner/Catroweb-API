<?php

/**
 * UserController
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
 * The version of the OpenAPI document: v1.0.32
 * Contact: webmaster@catrobat.org
 * Generated by: https://github.com/openapitools/openapi-generator.git
 */

/**
 * NOTE: This class is auto generated by the openapi generator program.
 * https://github.com/openapitools/openapi-generator
 * Do not edit the class manually.
 */

namespace OpenAPI\Server\Controller;

use Exception;
use JMS\Serializer\Exception\RuntimeException as SerializerRuntimeException;
use OpenAPI\Server\Api\UserApiInterface;
use OpenAPI\Server\Model\Register;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * UserController Class Doc Comment.
 *
 * @category Class
 *
 * @author   OpenAPI Generator team
 *
 * @see     https://github.com/openapitools/openapi-generator
 */
class UserController extends Controller
{
  /**
   * Operation userPost.
   *
   * Register
   *
   * @param Request $request the Symfony request to handle
   *
   * @return Response the Symfony response
   */
  public function userPostAction(Request $request)
  {
    // Make sure that the client is providing something that we can consume
    $consumes = ['application/json'];
    $inputFormat = $request->headers->has('Content-Type') ? $request->headers->get('Content-Type') : $consumes[0];
    if (!in_array($inputFormat, $consumes, true))
    {
      // We can't consume the content that the client is sending us
      return new Response('', 415);
    }

    // Figure out what data format to return to the client
    $produces = ['application/json'];
    // Figure out what the client accepts
    $clientAccepts = $request->headers->has('Accept') ? $request->headers->get('Accept') : '*/*';
    $responseFormat = $this->getOutputFormat($clientAccepts, $produces);
    if (null === $responseFormat)
    {
      return new Response('', 406);
    }

    // Handle authentication

    // Read out all input parameter values into variables
    $accept_language = $request->headers->get('Accept-Language');
    $register = $request->getContent();

    // Use the default value if no value was provided

    // Deserialize the input values that needs it
    try
    {
      $register = $this->deserialize($register, 'OpenAPI\Server\Model\Register', $inputFormat);
      $accept_language = $this->deserialize($accept_language, 'string', 'string');
    }
    catch (SerializerRuntimeException $exception)
    {
      return $this->createBadRequestResponse($exception->getMessage());
    }

    // Validate the input values
    $asserts = [];
    $asserts[] = new Assert\NotNull();
    $asserts[] = new Assert\Type('OpenAPI\\Server\\Model\\Register');
    $asserts[] = new Assert\Valid();
    $response = $this->validate($register, $asserts);
    if ($response instanceof Response)
    {
      return $response;
    }
    $asserts = [];
    $asserts[] = new Assert\Type('string');
    $response = $this->validate($accept_language, $asserts);
    if ($response instanceof Response)
    {
      return $response;
    }

    try
    {
      $handler = $this->getApiHandler();

      // Make the call to the business logic
      $responseCode = 200;
      $responseHeaders = [];
      $result = $handler->userPost($register, $accept_language, $responseCode, $responseHeaders);

      // Find default response message
      $message = 'User successfully registered.';

      // Find a more specific message, if available
      switch ($responseCode) {
                case 201:
                    $message = 'User successfully registered.';
                    break;
                case 204:
                    $message = 'Dry-run successful (No Validation Error)';
                    break;
                case 400:
                    $message = 'BAD Request - invalid or missing required parameters';
                    break;
                case 415:
                    $message = 'Unsupported Media Type - request must use application/json as content type';
                    break;
                case 422:
                    $message = 'Unprocessable Entity';
                    break;
            }

      return new Response(
                null !== $result ? $this->serialize($result, $responseFormat) : '',
                $responseCode,
                array_merge(
                    $responseHeaders,
                    [
                      'Content-Type' => $responseFormat,
                      'X-OpenAPI-Message' => $message,
                    ]
                )
            );
    }
    catch (Exception $fallthrough)
    {
      return $this->createErrorResponse(new HttpException(500, 'An unsuspected error occurred.', $fallthrough));
    }
  }

  /**
   * Returns the handler for this API controller.
   *
   * @return UserApiInterface
   */
  public function getApiHandler()
  {
    return $this->apiServer->getApiHandler('user');
  }
}
