## Docker

1. Open docker directory in console
2. Copy `.env.example` to `.env` and make necessary changes.
3. Run `make` command
4. Run `make shell php` to enter in php container

## Install

1. Run `composer install`
2. Run `php artisan migrate`
3. Run `php artisan ide-helper:generate`, `php artisan ide-helper:models -M` to generate files for ide.
4. Run `vendor/bin/phpstan`

## Notes
Repository should be reasonable clean, but here list of important files and changes:

* [Builder](src%2Fapp%2FModels%2FBuilder%2FBuilder.php)
  * Custom builder with 2 whereX methods that declare different return types.
* [Invitation.php](src%2Fapp%2FModels%2FInvitation.php)
  * Model uses custom Builder: [InvitationBuilder](src%2Fapp%2FModels%2FBuilder%2FInvitationBuilder.php)
* [User.php](src%2Fapp%2FModels%2FUser.php) 
    * Model uses custom Builder: [UserBuilder](src%2Fapp%2FModels%2FBuilder%2FUserBuilder.php)
* [Main.php](src%2Fapp%2FHttp%2FControllers%2FMain.php)
  * Main controller
* [phpstan.neon](src%2Fphpstan.neon)
  * phpstan config


## Results

### Controller
![Controller.png](images%2FController.png)

### PHPStan
![PHPStan.png](images%2FPHPStan.png)