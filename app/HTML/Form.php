<?php
namespace App\HTML;

use DateTimeInterface;

class Form
{

    private $data;
    private $errors;

    public function __construct($data, array $errors)
    {
        $this->data = $data;
        $this->errors = $errors;
    }

    public function input(string $key, string $label): string
    {
        $value = $this->getValue($key);
        $type = $key === "password" ? "password" : "text";
        return <<<HTML
        <div class="form-group">
            <label for="field{$key}"><b>{$label}</b></label>
            <input type="{$type}" id="field{$key}" class="{$this->getInputClass($key)}" name="{$key}" value="{$value}">
            {$this->getErrorFeedback($key)}
        </div>
HTML;
    }

    public function inputHidden(string $key, string $value): string
    {
        $value = "";
        $key = "";
        return <<<HTML
            <input type="hidden" name="{$key}" value="{$value}" id="{$key}">
            {$this->getErrorFeedback($key)}
HTML;
    }

    public function picture(string $key, string $label): string
    {
        $value = $this->getValue($key);
        $type = "file";
        return <<<HTML
        <div class="form-group">
            <label for="field{$key}"><b>{$label}</b></label>
            <input type="{$type}" id="field{$key}" class="{$this->getInputClass($key)}" name="{$key}" value="{$value}">
            {$this->getErrorFeedback($key)}
        </div>
HTML;
    }

    public function textarea(string $key, string $label): string
    {
        $value = $this->getValue($key);
        return <<<HTML
        <div class="form-group">
            <label for="field{$key}"><b>{$label}</b></label>
<textarea type="text" id="field{$key}" class="{$this->getInputClass($key)}" name="{$key}" required>{$value}</textarea>
            {$this->getErrorFeedback($key)}
        </div>
HTML;
    }

    public function select(string $key, string $label, array $options = []): string
    {
        $optionsHTML = [];
        $value = $this->getValue($key);
        foreach ($options as $k => $v) {
            $selected = in_array($k, $value) ? " selected" : "";
            $optionsHTML[] = "<option value=\"$k\"$selected>$v</option>";
        }
        $optionsHTML = implode('', $optionsHTML);
        return <<<HTML
        <div class="form-group">
            <label for="field{$key}"><b>{$label}</b></label>
<select id="field{$key}" class="{$this->getInputClass($key)}" name="{$key}[]" multiple>{$optionsHTML}</select>
            {$this->getErrorFeedback($key)}
        </div>
HTML;
    }

    // getValue
    private function getValue(string $key)
    {
        if (is_array($this->data)) {
            return $this->data[$key] ?? null;
        }
        $method = 'get' . str_replace(' ', '', ucwords(str_replace('_', ' ', $key)));
        $value = $this->data->$method();
        if ($value instanceof DateTimeInterface) {
            return $value->format('Y-m-d H:i:s');
        }
        return $value;
    }

    // gestion des erreur
    private function getInputClass(string $key): string
    {
        $inputClass = 'form-control';
        if (isset($this->errors[$key])) {
            $inputClass .= ' is-invalid';
        }
        return $inputClass;
    }

    // gestion des erreur
    private function getInputClassHidden(string $key): string
    {
        $inputClass = 'form-comment';
        if (isset($this->errors[$key])) {
            $inputClass .= ' is-invalid';
        }
        return $inputClass;
    }

    private function getErrorFeedback(string $key): string
    {
        if (isset($this->errors[$key])) {
            if (is_array($this->errors[$key])) {
                $error = implode('<br>', $this->errors[$key]);
            } else {
                $error = $this->errors[$key];
            }
            return '<div class="invalid-feedback">' . $error . '</div>';
        }
        return '';
    }
}
