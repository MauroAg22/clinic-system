create table
    ClinicaAreaMedico (
        cam_id int not null primary key auto_increment,
        cl_id int not null,
        a_id int not null,
        m_id int not null,
        cam_tel VARCHAR(50) unique,
        foreign key (cl_id) references clinica (cl_id),
        foreign key (a_id) references area (a_id),
        foreign key (m_id) references Medico (m_id),
        unique (cl_id, a_id, m_id)
    );

drop table ClinicaAreaMedico;