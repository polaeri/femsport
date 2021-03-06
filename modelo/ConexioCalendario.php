<?php

class ConexioCalendario {

    private $connexioCal = null;

    function __construct() {
        $this->connexioCal = new mysqli("endurorocks.com", "femsport", "xpid2015", "calendario");
    }

    function tancarConexio() {
        $this->connexioCal->close();
    }

    function registrarClub($cif, $email, $pistas) {

        $nomClub = $cif;

        $query_events = "
CREATE TABLE IF NOT EXISTS " . $nomClub . "_events (
  event_id int(8) unsigned NOT NULL AUTO_INCREMENT,
  event_type tinyint(1) unsigned NOT NULL DEFAULT '0',
  title varchar(64) DEFAULT NULL,
  description text,
  xfield1 text,
  xfield2 text,
  category_id int(4) unsigned NOT NULL DEFAULT '1',
  venue varchar(64) DEFAULT NULL,
  user_id int(6) unsigned DEFAULT NULL,
  editor varchar(32) NOT NULL DEFAULT '',
  approved tinyint(1) unsigned NOT NULL DEFAULT '0',
  private tinyint(1) unsigned NOT NULL DEFAULT '0',
  checked text,
  s_date date DEFAULT NULL,
  e_date date NOT NULL DEFAULT '9999-00-00',
  x_dates text,
  s_time time DEFAULT NULL,
  e_time time NOT NULL DEFAULT '99:00:00',
  r_type tinyint(1) unsigned NOT NULL DEFAULT '0',
  r_interval tinyint(1) unsigned NOT NULL DEFAULT '0',
  r_period tinyint(1) unsigned NOT NULL DEFAULT '0',
  r_month tinyint(1) unsigned NOT NULL DEFAULT '0',
  r_until date NOT NULL DEFAULT '9999-00-00',
  notify tinyint(1) NOT NULL DEFAULT '-1',
  not_mail varchar(255) DEFAULT NULL,
  a_datetime datetime NOT NULL DEFAULT '9999-00-00 00:00:00',
  m_datetime datetime NOT NULL DEFAULT '9999-00-00 00:00:00',
  status tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (event_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6";

        $query_cat = "CREATE TABLE IF NOT EXISTS " . $nomClub . "_categories (
  category_id int(4) unsigned NOT NULL AUTO_INCREMENT,
  name varchar(40) NOT NULL DEFAULT '',
  sequence int(2) unsigned NOT NULL DEFAULT '1',
  rpeat tinyint(1) unsigned NOT NULL DEFAULT '0',
  approve tinyint(1) unsigned NOT NULL DEFAULT '0',
  public tinyint(1) unsigned NOT NULL DEFAULT '1',
  color varchar(10) DEFAULT NULL,
  background varchar(10) DEFAULT NULL,
  chbox tinyint(1) unsigned NOT NULL DEFAULT '0',
  chlabel varchar(40) NOT NULL DEFAULT 'approved',
  chmark varchar(10) NOT NULL DEFAULT '&#10003;',
  status tinyint(1) NOT NULL DEFAULT '0',
  numero_tipo int(2) NOT NULL,
  PRIMARY KEY (category_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4;";

        $this->connexioCal->query($query_cat);



        $i = 1;
        foreach ($pistas as $key => $value) {
            $query_insertcat = "INSERT INTO " . $nomClub . "_categories (category_id, name, sequence, rpeat, approve, public, color, background, chbox, chlabel, chmark, status) VALUES";
            $query_insertcat.=" (" . $i . ", '" . $value->getTipo() . "_" . $value->getNumeroTipo() . "', 1, 0, 0, 1, NULL, NULL, 0, 'approved', '&#10003;', 0)";
            $i++;
            $this->connexioCal->query($query_insertcat);
        }


        $query_settings = "
CREATE TABLE IF NOT EXISTS " . $nomClub . "_settings (
  name varchar(15) NOT NULL DEFAULT '',
  value text,
  description text,
  PRIMARY KEY (name)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";


        $query_insertsettings = "
INSERT INTO " . $nomClub . "_settings (name, value, description) VALUES
('adminCronSum', '1', 'Send cron job summary to admin (0:no, 1:yes)'),
('backLinkUrl', '', 'Nav bar Back button URL (blank: no button, url: Back button)'),
('calendarEmail', '" . $email . "', 'Sender in and receiver of email notifications'),
('calendarTitle', '" . $nomClub . "', 'Calendar title displayed in the top bar'),
('calendarUrl', 'http://localhost/lux/', 'Calendar link (URL)'),
('catMenu', '1', 'Display category filter menu in options panel(0:no, 1:yes)'),
('chgEmailList', '', 'Recipient email addresses for calendar changes'),
('chgNofDays', '1', 'Number of days to look back for calendar changes'),
('colsToShow', '3', 'Number of months to show per row in year view'),
('cookieExp', '30', 'Number of days before a Remember Me cookie expires'),
('dateFormat', 'd.m.y', 'Date format: yyyy-mm-dd (y:yyyy, m:mm, d:dd)'),
('defaultView', '4', 'Calendar view at start-up (1:year, 2:month, 3:work month, 4:week, 5:work week 6:day, 7:upcoming, 8:changes)'),
('details4All', '1', 'Show event details to x users (0:none, 1:all, 2:logged-in users)'),
('DMdFormat', 'WD d M', 'Date format: weekday dd month (WD:weekday d:dd, M:month)'),
('DMdyFormat', 'WD d M y', 'Date format: weekday dd month yyyy (WD:weekday d:dd, M:month, y:yyyy)'),
('dwEndHour', '18', 'Day/week view end hour'),
('dwStartHour', '6', 'Day/week view start hour'),
('dwTimeSlot', '30', 'Day/week time slot in minutes'),
('dwTsHeight', '20', 'Day/week time slot height in pixels'),
('eventColor', '1', 'Event colors (0:user color, 1:cat color)'),
('eventExp', '0', 'Number of days after due when an event expires / can be deleted (0:never)'),
('evtDelButton', '1', 'Display Delete button in Event window (0:no, 1:yes, 2:manager)'),
('evtTemplGen', '1234567', 'Event fields and order of fields in general views'),
('evtTemplUpc', '12345', 'Event fields and order of fields in upcoming events view'),
('icsExport', '0', 'Daily export of events in iCal format (0:no 1:yes)'),
('langMenu', '0', 'Display ui-language selection menu in options panel (0:no, 1:yes)'),
('language', 'espanol', 'Default user interface language'),
('lcVersion', '3.2.3', 'LuxCal Version Number'),
('lookaheadDays', '14', 'Days to look ahead in upcoming view, todo list and RSS feeds'),
('mailServer', '1', 'Mail server (0:mail disabled, 1:PHP mail, 2:SMTP mail)'),
('maxNoLogin', '0', 'Number of days not logged in, before deleting user account (0:never delete)'),
('mCalUrlFull', '', 'Mini calendar link to full calendar'),
('MdFormat', 'd M', 'Date format: dd month (d:dd, M:month)'),
('MdyFormat', 'd M y', 'Date format: dd month yyyy (d:dd, M:month, y:yyyy)'),
('miniCalPost', '0', 'Mini calendar event posting (0:no, 1:yes)'),
('miniCalView', '1', 'Mini calendar view (1:full month, 2:work month)'),
('monthInDCell', '0', 'Show in month view month for each day (0:no, 1:yes)'),
('MyFormat', 'M y', 'Date format: month yyyy (M:month, y:yyyy)'),
('navButText', '0', 'Navigation buttons with text or icons (0:icons, 1:text)'),
('navTodoList', '1', 'Display Todo List button on navbar (0:no, 1:yes)'),
('navUpcoList', '1', 'Display Upco List button on navbar (0:no, 1:yes)'),
('notifSender', '0', 'Sender of notification emails (0:calendar, 1:user)'),
('popBoxFields', '12345', 'Event fields and order of fields in yesr view hover box'),
('popBoxMonth', '1', 'Display hover box in month view (0:no, 1:yes)'),
('popBoxUpc', '1', 'Display hover box in upcoming view (0:no, 1:yes)'),
('popBoxWkDay', '1', 'Display hover box in week/day view (0:no, 1:yes)'),
('popBoxYear', '1', 'Display hover box in year view (0:no, 1:yes)'),
('popFieldsMcal', '12345', 'Event fields in minical hover box (none: no box)'),
('popFieldsSbar', '12345', 'Event fields in sidebar hover box (none: no box)'),
('privEvents', '1', 'Private events (0:disabled 1:enabled, 2:default, 3:always)'),
('restLastSel', '1', 'Restore last session when user revisits calendar'),
('rowsToShow', '4', 'Number of rows to show in year view'),
('rssFeed', '1', 'Display RSS feed links in footer and HTML head (0:no, 1:yes)'),
('selfReg', '0', 'Self-registration (0:no, 1:yes)'),
('selfRegNot', '0', 'User self-reg notification to admin (0:no, 1:yes)'),
('selfRegPrivs', '1', 'Self-reg rights (1:view, 2:post self, 3:post all)'),
('showLinkInMV', '1', 'Show URL-links in month view (0:no, 1:yes)'),
('showLinkInSB', '1', 'Show URL-links in sidebar (0:no, 1:yes)'),
('sideBarDays', '14', 'Days to look ahead in sidebar'),
('smtpAuth', '1', 'Use SMTP authentication (0:no, 1:yes)'),
('smtpPass', '', 'SMTP password'),
('smtpPort', '465', 'SMTP port number'),
('smtpServer', '', 'SMTP mail server name'),
('smtpSsl', '1', 'Use SSL (Secure Sockets Layer) (0:no, 1:yes)'),
('smtpUser', '', 'SMTP username'),
('timeFormat', 'h:m', 'Time format (H:hh, h:h, m:mm, a:am|pm, A:AM|PM)'),
('timeZone', 'Europe/Amsterdam', 'Calendar time zone'),
('userMenu', '1', 'Display user filter menu in options panel (0:no, 1:yes)'),
('weekNumber', '1', 'Week numbers on(1) or off(0)'),
('weekStart', '1', 'Week starts on Sunday(0) or Monday(1)'),
('weeksToShow', '10', 'Number of weeks to show in month view'),
('workWeekDays', '12345', 'Days to show in work weeks (1:mo - 7:su)'),
('xField1', '', 'Label optional extra event field 1'),
('xField2', '', 'Label optional extra event field 2'),
('yearStart', '0', 'Start month in year view (1-12 or 0, 0:current month)');
";


        $query_user = "CREATE TABLE IF NOT EXISTS  " . $nomClub . "_users (
  user_id int(6) unsigned NOT NULL AUTO_INCREMENT,
  user_name varchar(32) NOT NULL DEFAULT '',
  password varchar(32) NOT NULL DEFAULT '',
  temp_password varchar(32) DEFAULT NULL,
  email varchar(64) NOT NULL DEFAULT '',
  privs tinyint(1) unsigned NOT NULL DEFAULT '0',
  login_0 date NOT NULL DEFAULT '9999-00-00',
  login_1 date NOT NULL DEFAULT '9999-00-00',
  login_cnt int(8) NOT NULL DEFAULT '0',
  language varchar(32) DEFAULT NULL,
  color varchar(10) DEFAULT NULL,
  status tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (user_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;";

        $query_insertuser = "
INSERT INTO " . $nomClub . "_users (user_id, user_name, password, temp_password, email, privs, login_0, login_1, login_cnt, language, color, status) VALUES
(1, 'Public Access', '', NULL, ' ', 1, '9999-00-00', '9999-00-00', 0, NULL, NULL, 0),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, '" . $email . "', 9, '2015-05-08', '2015-05-11', 35, NULL, NULL, 0);";





        $this->connexioCal->query($query_events);
        $this->connexioCal->query($query_settings);
        $this->connexioCal->query($query_user);

        $this->connexioCal->query($query_insertsettings);
        $this->connexioCal->query($query_insertuser);

        echo $this->connexioCal->error;
    }

    function consultarHorarios($cif, $data, $tipo) {
        $pistas = $this->buscarPistas($cif, $tipo);
        $sessio = new Session();
        $sessio->setSession("array_PistesLliures", $pistas);
        $horariosOcupados = $this->buscarHorariosPistas($pistas, $data, $cif);
        return $horariosOcupados;
    }

    function buscarPistas($cif, $tipo) {
        $sentenciaSql = "SELECT category_id FROM " . $cif . "_categories WHERE name LIKE '" . $tipo . "%'";
        $consulta = $this->connexioCal->query($sentenciaSql);
        $pistas = [];
        $i = 0;
        while ($vector = $consulta->fetch_array(MYSQLI_ASSOC)) {
            $pistas[$i] = $vector['category_id'];
            $i++;
        }
        return $pistas;
    }

    function buscarHorariosPistas($pistas, $data, $cif) {
        $totalArrays = [];
        $i = 0;
        $sesion = new Session();
        $sesion->setSession('cif_club_reserva', $cif);
        $sesion->setSession('data_club_reserva', $data);
        foreach ($pistas as $key => $value) {
            $sentenciaSql = "SELECT s_time, e_time, category_id FROM " . $cif . "_events WHERE category_id = '" . $value . "' AND s_date = '" . $data . "' AND e_date = '9999-00-00'";
            $consulta = $this->connexioCal->query($sentenciaSql);
            $horasOcupadas = [];
            $j = 0;
            while ($vector = $consulta->fetch_array(MYSQLI_ASSOC)) {
                $horasOcupadas[$j] = array("inicio" => $vector['s_time'], "final" => $vector['e_time'], "pista" => $vector['category_id']);
                $j++;
            }
            $totalArrays[$i] = $horasOcupadas;
            $i++;
        }
        return $totalArrays;
    }

    function mostrarHorarios($horariosOcupados) {
        $numeroPista = 1;
        $totalPistas = 0;
        $category_id = null;
        foreach ($horariosOcupados as $key => $pistas) {
            $totalPistas++;
        }
        if ($totalPistas > 0) {
            //DA TANTAS VUELTAS COMO PISTAS HAY            
            foreach ($horariosOcupados as $key1 => $pistas) {
                $arrayHoras = [];
                for ($i = 0; $i <= 30; $i++) {
                    $arrayHoras[$i] = true;
                }
                //DA TANTAS VUELTAS COMO RESERVAS EN LA PISTA HAY
                foreach ($pistas as $key => $value) {
                    $j = 0;
                    for ($i = 8; $i <= 23; $i++) {
                        if ($i < 10) {
                            $horaInicio = ("0" . $i . ":00:00");
                            $horaInicio2 = ("0" . $i . ":30:00");
                        } else {
                            $horaInicio = ($i . ":00:00");
                            $horaInicio2 = ($i . ":30:00");
                        }
                        if ($value['inicio'] === $horaInicio || $value['inicio'] === $horaInicio2) {
                            $arrayHoras[$j] = false;
                            $arrayHoras[($j + 1)] = false;
                        }
                        $j++;
                        $j++;
                    }
                }
                //PRINTAMOS LOS SELECTS
                echo "<h3 class='titol2'>Pista " . $numeroPista . "</h3>";
                echo "<form action='index.php' method='POST'>";
                echo "<select name='hora'>";
                echo "<option value='null'>Elige horario</option>";
                $j = 8;
                for ($i = 0; $i < 29; $i++) {
                    if ($arrayHoras[$i]) {
                        if (!$arrayHoras[($i + 1)]) {
                            echo "<option value = 'null'>NO</option>";
                        } else if ($i % 2 == 0) {
                            echo "<option value = '" . ($j . ":00") . "'>" . ($j . ":00") . "</option>";
                        } else {
                            echo "<option value = '" . ($j . ":30") . "'>" . ($j . ":30") . "</option>";
                            $j++;
                        }
                    } else {
                        if ($i % 2 == 0) {
                            $j++;
                        }
                        echo "<option value = 'null'>RESERVADA</option>";
                    }
                }
                echo "</select>";
                echo "<input type='hidden' name='category_id' value='" . ($numeroPista - 1) . "'>";
                echo "<button type='submit' class='boton azul formaBoton ' data-toggle='modal' data-target='#myModal' name='accion' value='reservarPista'>Siguiente</button>";
                echo "</form>";
                $numeroPista++;
            }
        } else {
            echo "<h1>No hay pistas disponibles</h1>";
        }
    }

    function insertarReserva($hora, $data, $club, $usuario, $dni, $category_id, $email) {

        if (substr($hora, 3, 1) == "3") {
            $hora_final_1 = (substr($hora, 0, 2));
            $hora_final_2 = intval($hora_final_1);
            $hora_final_3 = $hora_final_2 + 1;
            $hora_final = $hora_final_3 . ":30:00";
        } else {
            $hora_final_1 = (substr($hora, 0, 2));
            $hora_final_2 = intval($hora_final_1);
            $hora_final_3 = $hora_final_2 + 1;
            $hora_final = $hora_final_3 . ":00:00";
        }




        $sentenciaSQL = "INSERT INTO ".$club."_events (event_id, event_type, title, description, xfield1, xfield2, category_id, venue, user_id, editor, approved, private, checked, s_date, e_date, x_dates, s_time, e_time, r_type, r_interval, r_period, r_month, r_until, notify, not_mail, a_datetime, m_datetime, status) VALUES
(NULL , 0, '" . $usuario . "_" . $dni . "', '', '', '', '" . $category_id . "', '', 2, '', 0, 0, NULL, '" . $data . "', '9999-00-00', NULL, '" . $hora . "', '" . $hora_final . "', 0, 0, 0, 0, '9999-00-00', -1, '" . $email . "', '2015-00-0 00:00:00', '9999-00-00 00:00:00', 0);";

        $this->connexioCal->query($sentenciaSQL);
    }

    function buscarNombrePista($cif, $category_id) {
        $sentenciaSql = "SELECT name FROM " . $cif . "_categories WHERE category_id = '" . $category_id . "'";
        $consulta = $this->connexioCal->query($sentenciaSql);
        while ($vector = $consulta->fetch_array(MYSQLI_ASSOC)) {
            $name = $vector['name'];
        }
        return $name;
    }

}
