<?php 

namespace rpsteinbrueck\jwe23\classes\model\row;
use rpsteinbrueck\jwe23\classes\mysql;

abstract class row_abstract {
    protected string $table;
    private array $data = array();

    public function __construct(array|int $id_or_data) {
        if (is_array($id_or_data)) {
            $this->data = $id_or_data;
        } else {
            #$conn = new mysql();
            $conn = mysql::get_instance();
            $sql_id = $conn->escape($id_or_data);
            $results = $conn->query("SELECT * FROM " . $this->table . " WHERE id = '{$sql_id}';");
            $this->data = $results->fetch_assoc();
        }
    }

    public function __get(string $property): mixed {
        if (!array_key_exists($property, $this->data)) {
            throw new \Exception("The column " . $property . " does not exists in " . $this->table . " ." );
        }
        return $this->data[$property];
    }

    public function save(): void {

        #$conn = new mysql();
        $conn = mysql::get_instance();
        $sql_fields = "";

        foreach ($this->data as $column_name => $value) {
            if ($column_name == "id") { // spaltenname "id" nie updaten oder inserten
                continue;
            }
            $sql_value = $conn->escape($value);
            $sql_fields .= "{$column_name} = '{$value}', "; 
        }

        // Letztes Komma entfernen
        $sql_fields = rtrim($sql_fields, ", ");

        // In DB einfügen
        if (!empty($this->data["id"])) {
            // in DB bearbeiten
            $sql_id = $conn->escape($this->data["id"]);
            $db->query("UPDATE {$this->tabelle} SET {$sql_felder} WHERE id = '{$sql_id}'");
        } else {
            // in DB einfügen
            $conn->query("INSERT INTO {$this->table} SET {$sql_fields}");
        }

    }

    public function remove(): void {
        #$conn = new mysql();
        $conn = mysql::get_instance();
        $sql_id = $conn->escape($this->id);
        $conn->query("DELETE FROM {$table} WHERE id = '{$sql_id}'");
    }

}