<?php

function regexEmail($email) {
  $rule = '/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/';
  return preg_match($rule, $email);
}
