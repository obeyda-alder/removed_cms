<?php

declare(strict_types=1);

namespace App\Auth;

use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

/**
 * Class PinGuard
 */
class CustomGuard implements Guard
{
    /**
     * @var null|Authenticatable|User
     */
    protected $user;

    /**
     * @var Request
     */
    protected $request;

    /**
     * OpenAPIGuard constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Check whether user is logged in.
     *
     * @return bool
     */
    public function check(): bool
    {
        return (bool)$this->user();
    }

    /**
     * Check whether user is not logged in.
     *
     * @return bool
     */
    public function guest(): bool
    {
        return !$this->check();
    }

    /**
     * Return user id or null.
     *
     * @return null|int
     */
    public function id(): ?int
    {
        $user = $this->user();
        return $user->id ?? null;
    }

    /**
     * Manually set user as logged in.
     *
     * @param  null|\App\User|\Illuminate\Contracts\Auth\Authenticatable $user
     * @return $this
     */
    public function setUser(?Authenticatable $user): self
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @param  array $credentials
     * @return bool
     */
    public function validate(array $credentials = []): bool
    {
        throw new \BadMethodCallException('Unexpected method call');
    }

    /**
     * Return user or throw AuthenticationException.
     *
     * @throws AuthenticationException
     * @return \App\User
     */
    public function authenticate(): User
    {
        $user = $this->user();
        if ($user instanceof User) {
            return $user;
        }
        throw new AuthenticationException();
    }

    /**
     * Return cached user or newly authenticate user.
     *
     * @return null|\App\User|\Illuminate\Contracts\Auth\Authenticatable
     */
    public function user(): ?User
    {
        return $this->user ?: $this->signInWithApi();
    }

    /**
     * Sign in using requested PIN.
     *
     * @return null|User
     */
    protected function signInWithApi(): ?User
    {
        return null;
        // Implement your logic here
        // Return User on success, or return null on failure
    }

    /**
     * Logout user.
     */
    public function logout(): void
    {
        if ($this->user) {
            $this->setUser(null);
        }
    }
}
