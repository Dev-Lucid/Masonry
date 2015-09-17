<?php

namespace html;

class tbody extends tag
{
    protected $_tag = 'tbody';

    public function import_data($iterable_obj,$column_order = null)
    {
        foreach($iterable_obj as $row_data)
        {
            $row = $this->add(new table_row())->last_child();

            if (is_null($column_order))
            {
                foreach($row_data as $data)
                {
                    $row->add(new table_cell($data));
                }
            }
            else
            {
                foreach($column_order as $column)
                {
                    if (is_object($row_data))
                    {
                        $row->add(new table_cell($row_data->$column));
                    }
                    else
                    {
                        $row->add(new table_cell($row_data[$column]));    
                    }
                }

            }
        }
    }
}
