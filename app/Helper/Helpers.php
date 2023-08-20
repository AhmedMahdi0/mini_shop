<?php

function sendWelcomeEmail($user): void
{
    \App\Jobs\SendUserEmail::dispatch($user);
}

