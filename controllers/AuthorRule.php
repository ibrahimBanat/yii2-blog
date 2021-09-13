<?php

namespace app\rbac;

use yii\rbac\Rule;

/**
 *
 * Checks if AuthorID matches user passed via params
 */

class AuthorRule extends Rule {
    public $name = 'isAuthor';

    /**
     *  the rule here checks if the post is created by $user
     * @param string|int $user the user id
     * @param string $item the role or permission that the rule is associated with
     * @param array $params parameters passed to MangerInterface::checkAccess().
     * @return bool a value indicating whether the rule or permission it is associated with.
     *
     */
    public function execute($user, $item, $params) {
        return isset($param['post']) ? $param['post']->createdBy == $user : false;
    }
}