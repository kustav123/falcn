<a href="javascript:void(0)" data-toggle="tooltip" onClick="editStaff('{{ $row->userId }}')" data-original-title="Edit"
    class="edit btn btn-success edit-{{ $row->userId }}">
    Edit
</a>
<a href="javascript:void(0);" id="delete-compnay" onClick="deleteStaff('{{ $row->userId }}')" data-toggle="tooltip"
    data-original-title="Delete" class="delete btn btn-danger delete-{{ $row->userId }}">
    Delete
</a>
