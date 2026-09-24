# Changelog

All notable changes to `a2zwebltd/unleashed-api-client` are documented in this file.
The format follows [Keep a Changelog](https://keepachangelog.com/en/1.1.0/) and the project uses [Semantic Versioning](https://semver.org/).

## [1.0.0] - 2026-09-24

First tagged release.

### Added
- `UnleashedApi` entry point exposing 38 Unleashed resources as lazily loaded services (`$api->customers`, `$api->products`, `$api->salesOrders`, ...).
- `UnleashedClient` HTTP client with HMAC-SHA256 request signing and `ApiException` / `AuthenticationException` error mapping.
- Typed DTOs for editable resources, read-only lookups and line items.
- Smoke tests covering every service property and a request through a mocked Guzzle handler.
- `phpcs.xml.dist` (PSR-12) and `phpstan.neon.dist` so `composer cs-check` and `composer phpstan` run out of the box.

### Fixed
- README install command now uses the real package name, `a2zwebltd/unleashed-api-client`.
- README service reference now matches the code (`salespersons`, `warehouseStockTransfer`, actual method names and signatures).

### Removed
- Unused `symfony/serializer`, `symfony/property-access` and `symfony/validator` requirements.

[1.0.0]: https://github.com/a2zwebltd/unleashed-api-client/releases/tag/v1.0.0
