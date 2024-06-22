<a href="javascript:void(0)" data-toggle="tooltip" onClick="editStaff('{{ $row->fid }}')" data-original-title="Edit"
    class="edit btn btn-success edit-{{ $row->fid }}">
    Edit
</a>
<a href="javascript:void(0);" id="delete-compnay" onClick="deleteStaff('{{ $row->fid }}')" data-toggle="tooltip"
    data-original-title="Disable" class="delete btn btn-danger delete-{{ $row->fid }}">
    Disable
</a>
