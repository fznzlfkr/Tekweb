<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public string $fromEmail;
    public string $fromName;
    public string $recipients = '';

    public string $userAgent;
    public string $protocol;
    public string $mailPath;
    public string $SMTPHost;
    public string $SMTPUser;
    public string $SMTPPass;
    public int    $SMTPPort;
    public int    $SMTPTimeout;
    public bool   $SMTPKeepAlive;
    public string $SMTPCrypto;
    public bool   $wordWrap;
    public int    $wrapChars;
    public string $mailType;
    public string $charset;
    public bool   $validate;
    public int    $priority;
    public string $CRLF;
    public string $newline;
    public bool   $BCCBatchMode;
    public int    $BCCBatchSize;
    public bool   $DSN;

    public function __construct()
    {
        $this->fromEmail      = env('email.fromEmail', 'noreply@example.com');
        $this->fromName       = env('email.fromName', 'MyApp');
        $this->userAgent      = 'CodeIgniter';
        $this->protocol       = env('email.protocol', 'smtp');
        $this->mailPath       = '/usr/sbin/sendmail';
        $this->SMTPHost       = env('email.SMTPHost', '');
        $this->SMTPUser       = env('email.SMTPUser', '');
        $this->SMTPPass       = env('email.SMTPPass', '');
        $this->SMTPPort       = (int) env('email.SMTPPort', 2525);
        $this->SMTPTimeout    = 60;
        $this->SMTPKeepAlive  = false;
        $this->SMTPCrypto     = '';
        $this->wordWrap       = true;
        $this->wrapChars      = 76;
        $this->mailType       = 'html';
        $this->charset        = 'UTF-8';
        $this->validate       = false;
        $this->priority       = 3;
        $this->CRLF           = "\r\n";
        $this->newline        = "\r\n";
        $this->BCCBatchMode   = false;
        $this->BCCBatchSize   = 200;
        $this->DSN            = false;
    }
}
