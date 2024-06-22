<a href="javascript:void(0)" data-toggle="tooltip" onClick="editStaff('{{ $row->sid }}')" data-original-title="Edit"
    class="edit btn btn-success edit-{{ $row->sid }}">
    Edit
</a>
<a href="javascript:void(0);" id="delete-compnay" onClick="deleteStaff('{{ $row->sid }}')" data-toggle="tooltip"
    data-original-title="Disable" class="delete btn btn-danger delete-{{ $row->sid }}">
    Disable
</a>
