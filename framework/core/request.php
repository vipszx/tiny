<?php

namespace framework\core;

class request
{
    public $input;

    public function __construct()
    {
        $this->input = file_get_contents('php://input');
    }

    public function get($name = '', $default = null)
    {
        return $name ? $_GET[$name] ?? $default : $_GET;
    }

    public function post($name = '', $default = null)
    {
        return $name ? $_POST[$name] ?? $default : $_POST;
    }

    public function put($name = '', $default = null)
    {
        if ($this->input) {
            parse_str($this->input, $output);
            return $name ? $output[$name] ?? $default : $output;
        }
        return $default;
    }

    public function patch($name = '', $default = null)
    {
        if ($this->input) {
            parse_str($this->input, $output);
            return $name ? $output[$name] ?? $default : $output;
        }
        return $default;
    }

    public function delete($name = '', $default = null)
    {
        if ($this->input) {
            parse_str($this->input, $output);
            return $name ? $output[$name] ?? $default : $output;
        }
        return $default;
    }

    public function param($name = '', $default = null)
    {
        $method = $_SERVER['REQUEST_METHOD'];
        // 自动获取请求变量
        switch ($method) {
            case 'POST':
                $vars = $this->post($name, $default);
                break;
            case 'PUT':
                $vars = $this->put($name, $default);
                break;
            case 'DELETE':
                $vars = $this->delete($name, $default);
            case 'PATCH':
                $vars = $this->patch($name, $default);
                break;
            default:
                $vars = $this->get($name, $default);
        }
        return $vars;
    }
}