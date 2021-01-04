<?php
namespace Classe\HTML;

class Form {

    private $data;
    private $errors;

    public function __construct ($data, array $errors)
    {
        $this->data = $data;
        $this->errors = $errors;
    }

    public function input (string $key, string $label): string 
    {
        $value = $this->obtenirValeur($key);
        $type = $key === "password" ? "password" : "text";
        return <<<HTML
        <div class="form-group">
            <label for="field{$key}"><b>{$label}</b></label>
            <input type="{$type}" id="field{$key}" class="{$this->obtenirInputClass($key)}" name="{$key}" value="{$value}" required>
            {$this->obtenirErrorFeedback($key)}
        </div>
HTML;
    }

    public function image (string $key, string $label): string 
    {
        $value = $this->obtenirValeur($key);
        $type = "file";
        return <<<HTML
        <div class="form-group">
            <label for="field{$key}"><b>{$label}</b></label>
            <input type="{$type}" id="field{$key}" class="{$this->obtenirInputClass($key)}" name="{$key}" value="{$value}">
            {$this->obtenirErrorFeedback($key)}
        </div>
HTML;
    }

    public function textarea (string $key, string $label): string
    {
        $value = $this->obtenirValeur($key);
        return <<<HTML
        <div class="form-group">
            <label for="field{$key}"><b>{$label}</b></label>
            <textarea type="text" id="field{$key}" class="{$this->obtenirInputClass($key)}" name="{$key}" required>{$value}</textarea>
            {$this->obtenirErrorFeedback($key)}
        </div>
HTML;
    }

    public function select (string $key, string $label, array $options = []): string
    {
        $optionsHTML = [];
        $value = $this->obtenirValeur($key);
        foreach($options as $k => $v) {
            $selected = in_array($k, $value) ? " selected" : "";
            $optionsHTML[] = "<option value=\"$k\"$selected>$v</option>";
        }
        $optionsHTML = implode('', $optionsHTML);
        return <<<HTML
        <div class="form-group">
            <label for="field{$key}"><b>{$label}</b></label>
            <select id="field{$key}" class="{$this->obtenirInputClass($key)}" name="{$key}[]" required multiple>{$optionsHTML}</select>
            {$this->obtenirErrorFeedback($key)}
        </div>
HTML;
    }

    // getValue
    private function obtenirValeur (string $key) {
        if(is_array($this->data)) {
            return $this->data[$key] ?? null;
        }
        $method = 'obtenir' . str_replace(' ', '', ucwords(str_replace('_', ' ', $key)));
        $value = $this->data->$method();
        if($value instanceof \DateTimeInterface){
            return $value->format('Y-m-d H:i:s');
        }
        return $value;
    }

    // gestion des erreur
    private function obtenirInputClass (string $key): string{
        $inputClass = 'form-control';
        if(isset($this->errors[$key])) {
            $inputClass .= ' is-invalid';
        }
        return $inputClass;
    }

    private function obtenirErrorFeedback (string $key): string{
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