# DocuSign WebForms PHP Client Changelog
See [DocuSign Support Center](https://support.docusign.com/en/releasenotes/) for Product Release Notes.

## [v3.0.0] - WebForms API v1.1.0-1.0.6 - 2026-11-02
### Breaking
- **A PHP release patched for PHP2Shell is required.** The minimum PHP version is raised from 7.4 to `"php": "~8.2.35 || ~8.3.36 || ~8.4.27 || >=8.5.12"`:
  - 8.2.35 or any later 8.2 release
  - 8.3.36 or any later 8.3 release
  - 8.4.27 or any later 8.4 release
  - 8.5.12 or later

  Composer refuses to install the SDK on PHP 7.4, 8.0 and 8.1 (end-of-life), and on releases affected by CVE-2026-109618 / CVE-2026-109619. See the [PHP security advisory](https://www.php.net/archive/2026.php#2026-10-21-5). If your Linux distribution has backported the fix but reports an older version number, install with `composer install --ignore-platform-req=php`, and only after confirming that your PHP build includes the fix.
- **JWT library changed to `firebase/php-jwt` (^7.0)**, replacing `adhocore/jwt` (^1.1). The signatures of `requestJWTUserToken()` and `requestJWTApplicationToken()` are unchanged.
- **JWT Grant now requires an RSA private key of at least 2048 bits.** A shorter key throws `DomainException: Provided key is too short` before any request is sent. To check your key size, run `openssl rsa -in private.key -noout -text | head -1`.
- **Response header names are now lowercased.** The header arrays returned by the `*WithHttpInfo` methods and by `ApiException::getResponseHeaders()` use lowercase keys (for example `content-type` and `content-disposition`). Code that reads a header with its original casing, such as `$headers['Content-Type']`, must use the lowercase key instead.

### Fixed
- Removed the deprecated `utf8_decode()` call from the Basic authorization header in `generateAccessToken()` and `refreshAccessToken()`. On PHP 8.2 and later it raised a deprecation warning on every call. The header value is unchanged.

### Changed
- Updated the README requirements and dependency list.
- Updated the SDK release version.

### Known issues
- 40 legacy classes raise PHP deprecation warnings when loaded. Functionality is not affected. This will be fixed in a future release.
  - From PHP 8.4, all 40 have constructors that declare `array $data = null` instead of an explicit nullable type: `AccountId`, `AssertionId`, `AuthenticationInstant`, `BrandId`, `ClientUserId`, `ComponentKey`, `Count`, `CreatedDateTime`, `DateTime`, `EnvelopeId`, `ExpirationDateTime`, `ExpirationOffset`, `FormSortBy`, `FormUrl`, `Guid`, `InstanceId`, `InstanceToken`, `IsPrivateAccess`, `IsPublished`, `IsStandalone`, `LastModifiedDateTime`, `ReturnUrl`, `SearchText`, `SecurityDomain`, `SortBy`, `StartPosition`, `TokenExpirationDateTime`, `UpdateInstanceRequestBody`, `UserId`, `WebFormId`, `WebFormName`, `WebFormPaginatedList`, `WebFormValues`, `WebFormVersionId`, `WebFormWithMetadata`, `Account`, `Link`, `OAuthToken`, `Organization` and `UserInfo`.
  - From PHP 8.1, 5 of them also implement `ArrayAccess` without return types: `Account`, `Link`, `OAuthToken`, `Organization` and `UserInfo`.

## [v2.1.2] - WebForms API v1.1.0-1.0.6 - 2026-06-16
### Changed
- Replaced JWT dependency: Switched from firebase/php-jwt (^6.0) to adhocore/jwt (^1.1) in composer.json template.
- Updated JWT import namespace: Changed use Firebase\JWT\JWT to use Ahc\Jwt\JWT in ApiClient.
## [v2.1.1] - WebForms API v1.1.0-1.0.6 - 2025-10-27
### Changed
- Added explicit nullable type hints (?Type) to parameters that accept null, improving type safety and consistency.
- Updated the SDK release version.
  
## [v2.1.0] - WebForms API v1.1.0-1.0.5 - 2025-07-15
### Changed
- Added support for version v1.1.0-1.0.5 of the DocuSign WebForms API.
- Updated the SDK release version.

## [v2.0.0] - WebForms API v1.1.0-1.0.4 - 2024-11-20
### Changed
- Added support for version v1.1.0-1.0.4 of the DocuSign WebForms API.
- Updated the SDK release version.

## Important Action Required
- User needs to update the base URL in your codebase (if passing to SDK explicitly) and remove the /v1.1 component at the end of the URL for the SDK to work properly with this release.

## [v2.0.0-rc1] - WebForms API v1.1.0-1.0.4 - 2024-09-24
### Changed
- Added support for version v1.1.0-1.0.4 of the DocuSign WebForms API.
- Updated the SDK release version.

## Important Action Required
- User needs to update the base URL in your codebase (if passing to SDK explicitly) and remove the /v1.1 component at the end of the URL for the SDK to work properly with this release.

## [v1.0.1] - WebForms API v1.1.0-1.0.3 - 2024-04-22
### Changed
- Adjusted the minimum required firebase/php-jwt package version to 6.0.
- Updated the SDK release version.

## [v1.0.1-rc1] - WebForms API v1.1.0-1.0.3 - 2024-03-19
### Changed
- Adjusted the minimum required firebase/php-jwt package version to 6.0.

## [v1.0.0] - WebForms API v1.1.0-1.0.2 - 2024-02-14
## Version 1.0.0 (Initial Release)
- Introducing the SDK based on the OpenAPI specification of DocuSign WebForms APIs.
- This release marks the initial availability of the SDK, providing developers with the necessary tools to interact with DocuSign WebForms APIs seamlessly.
