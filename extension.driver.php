<?php

class extension_asset_pipeline_livescript extends Extension
{
    public function getSubscribedDelegates()
    {
        return array(
            array(
                'page' => '/extension/asset_pipeline/',
                'delegate' => 'RegisterPlugins',
                'callback' => 'register'
            )
        );
    }

    function register($context)
    {
        $context['plugins']['ls'] = array('output_type' => 'js', 'driver' => $this);
    }

    public function compile($content)
    {
        $result = shell_exec(
            'node ' . escapeshellarg(__DIR__ . '/lib/compile.js') . ' ' . escapeshellarg($content)
        );
        $pos = strpos($result, ' ');
        return array(substr($result, 0, $pos) => substr($result, $pos + 1));
    }
}
