<?php

/**
 * Part of the Joomla Framework Session Package
 *
 * @copyright  Copyright (C) 2005 - 2021 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Joomla\Session;

/**
 * Interface defining a Joomla! Session object
 *
 * @since  2.0.0
 */
interface SessionInterface extends \IteratorAggregate
{
    /**
     * Get expiration time in seconds
     *
     * @return  integer  The session expiration time in seconds
     *
     * @since   2.0.0
     */
    public function getExpire();

    /**
     * Get the session name
     *
     * @return  string  The session name
     *
     * @since   2.0.0
     */
    public function getName();

    /**
     * Set the session name
     *
     * @param   string  $name  The session name
     *
     * @return  $this
     *
     * @since   2.0.0
     */
    public function setName(string $name);

    /**
     * Get the session ID
     *
     * @return  string  The session ID
     *
     * @since   2.0.0
     */
    public function getId();

    /**
     * Set the session ID
     *
     * @param   string  $id  The session ID
     *
     * @return  $this
     *
     * @since   2.0.0
     */
    public function setId(string $id);

    /**
     * Check if the session is active
     *
     * @return  boolean
     *
     * @since   2.0.0
     */
    public function isActive();

    /**
     * Check whether this session is newly created
     *
     * @return  boolean
     *
     * @since   2.0.0
     */
    public function isNew();

    /**
     * Check if the session is started
     *
     * @return  boolean
     *
     * @since   2.0.0
     */
    public function isStarted();

    /**
     * Get a session token.
     *
     * Tokens are used to secure forms from spamming attacks. Once a token has been generated the system will check the request to see if
     * it is present, if not it will invalidate the session.
     *
     * @param   boolean  $forceNew  If true, forces a new token to be created
     *
     * @return  string
     *
     * @since   2.0.0
     */
    public function getToken($forceNew = false);

    /**
     * Check if the session has the given token.
     *
     * @param   string   $token        Hashed token to be verified
     * @param   boolean  $forceExpire  If true, expires the session
     *
     * @return  boolean
     *
     * @since   2.0.0
     */
    public function hasToken($token, $forceExpire = true);

    /**
     * Get data from the session store
     *
     * @param   string  $name     Name of a variable
     * @param   mixed   $default  Default value of a variable if not set
     *
     * @return  mixed  Value of a variable
     *
     * @since   2.0.0
     */
    public function get($name, $default = null);

    /**
     * Set data into the session store
     *
     * @param   string  $name   Name of a variable.
     * @param   mixed   $value  Value of a variable.
     *
     * @return  mixed  Old value of a variable.
     *
     * @since   2.0.0
     */
    public function set($name, $value = null);

    /**
     * Check whether data exists in the session store
     *
     * @param   string  $name  Name of variable
     *
     * @return  boolean  True if the variable exists
     *
     * @since   2.0.0
     */
    public function has($name);

    /**
     * Unset a variable from the session store
     *
     * @param   string  $name  Name of variable
     *
     * @return  mixed   The value from session or NULL if not set
     *
     * @since   2.0.0
     */
    public function remove(string $name);

    /**
     * Clears all variables from the session store
     *
     * @return  void
     *
     * @since   2.0.0
     */
    public function clear();

    /**
     * Retrieves all variables from the session store
     *
     * @return  array
     *
     * @since   2.0.0
     */
    public function all(): array;

    /**
     * Start a session
     *
     * @return  void
     *
     * @since   2.0.0
     */
    public function start();

    /**
     * Frees all session variables and destroys all data registered to a session
     *
     * This method resets the $_SESSION variable and destroys all of the data associated
     * with the current session in its storage (file or DB). It forces new session to be
     * started after this method is called. It does not unset the session cookie.
     *
     * @return  boolean
     *
     * @see     session_destroy()
     * @see     session_unset()
     * @since   2.0.0
     */
    public function destroy();

    /**
     * Restart an expired or locked session
     *
     * @return  boolean  True on success
     *
     * @see     destroy
     * @since   2.0.0
     */
    public function restart();

    /**
     * Create a new session and copy variables from the old one
     *
     * @return  boolean
     *
     * @since   2.0.0
     */
    public function fork();

    /**
     * Writes session data and ends session
     *
     * Session data is usually stored after your script terminated without the need
     * to call SessionInterface::close(), but as session data is locked to prevent concurrent
     * writes only one script may operate on a session at any time. When using
     * framesets together with sessions you will experience the frames loading one
     * by one due to this locking. You can reduce the time needed to load all the
     * frames by ending the session as soon as all changes to session variables are
     * done.
     *
     * @return  void
     *
     * @see     session_write_close()
     * @since   2.0.0
     */
    public function close();

    /**
     * Perform session data garbage collection
     *
     * @return  integer|boolean  Number of deleted sessions on success or boolean false on failure or if the function is unsupported
     *
     * @see     session_gc()
     * @since   2.0.0
     */
    public function gc();

    /**
     * Aborts the current session
     *
     * @return  boolean
     *
     * @see     session_abort()
     * @since   2.0.0
     */
    public function abort(): bool;
}
