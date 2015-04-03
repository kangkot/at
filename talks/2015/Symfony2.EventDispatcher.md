Event dispatcher component & Observer design pattern
====

## 1. Why?

1. Open-Close principle
- Open for extending, inheriting, …
- Close modification, editing, hacking, …
- Portable code
- Extendable code
- Testable code
- Wikipedia › Observer design pattern

## 2. Why Symfony2 Event dispatcher component?

1. Built by people we trust
- Well documented
- Well tested
- Used in Drupal 8
- Super simple

## 3. Concepts

- Dispatcher
- Event
- Listener
- Subscriber

4. Example

My web application has user login functionality, I would like other developer can invoke their code on this event.

Simple steps are:

1. First, I have to define the user login event.
- Get dispatcher, dispatch the event.
- Give example for other developers how to involve

```php
<?php

/**
 * Step 01: Define event
 */

class UserLoginEvent extends Symfony\Component\EventDispatcher\Event {
  private $user;

  public function __construct($user) {
    $this->user = $user;
  }

  public function getUser() {
    return $this->user;
  }
}
```

```php
?php

/**
 * Step 02: Dispatch the event
 */

# ---------------------
# Procedure example
# ---------------------

// Create dispatcher
$dispatcher = new Symfony\Component\EventDispatcher\EventDispatcher();

// Dispatch the event
$event = new UserLoginEvent($event);
$dispatcher->dispatch('user.login', $event);

# ---------------------
# OOP example
# ---------------------
class MyUserLoginController {
  private $dispatcher;
  public function __construct(Symfony\Component\EventDispatcher\EventDispatcherInterface $dispatcher) {
    $this->dispatcher = $dispatcher;
  }

  public function userLoginAction($user) {
    $event = new UserLoginEvent($event);
    $this->dispatcher->dispatch('user.login', $event);
  }
}
```

```php
<?php

/**
 * Step 03: Show how to involve to the event
 */

// Example 1: Closure
$dispatcher->addListener('user.login', function(UserLoginEvent $event) {
  // …
});

// Example 2: Class
$listener = new AcmeListener();
$dispatcher->addListener('user.login', [$listener, 'onUserLoginAction']);

// Example 3: Subsriber
class UserEventSubscriber implements Symfony\Component\EventDispatcher\EventSubscriberInterface {
  public static function getSubscribedEvents()
    {
        return [
            'user.login' => [
              ['onUserLoginDoLogIPAddress', 0],
              ['onUserLoginDoUpdateUserPoints', 2],
              ['onUserLoginDoLogging', 3]
            ],
            'user.update' => ['onUserUpdateDoFoo', 0],
            'user.logout' => ['onUserLogoutDoBar', 0],
        ];
    }
}

$dispatcher->addSubscriber(new UserEventSubscriber());
```

## 5. What's problem with Drupal's hooking system

1. Function based
- Depends on module system, which is not available outside Drupal.
- A module can only have one hook implementation
- Priority is hard
  - user login
    - kwokfeng_user_login() — module' s wight
    - weiseng_user_login()
  - user logout
    - weiseng_user_logout()
    - kwokfeng_user_logout()
- Hard to test

## 6. References

1. [Observer design pattern](http://sourcemaking.com/design_patterns/Observer)
- [Symfony2 event dipatcher component](http://symfony.com/doc/current/components/event_dispatcher/index.html)
