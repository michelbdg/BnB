



#### Review

| Property  | type      | Description           | Relationship |
| --------  | ----      | -----------           | ------------ |
| title     | string    | 50 NOT NUL            |              |
| comment   | text      | NOT NULL              |              |
| rating    | integer   | NOT NULL              |              |
| create_at | datetime  | NOT NULL              |              |
| traveler  | ManyToONe | NOT NULL, OrphanTrue  | User         |
| rooms     | ManyToONe | NOT NULL, OrphanTrue  | Room         |
| bookings  | OneToOne  | NOT NULL, OrphanTrue  | Booking      |




### Booking

this entity represents a booking made by a  traveler to a room.

| Property   | type      | Description           | Relationship |
| --------   | ----      | -----------           | ------------ |
| number     | string    | 50 NOT NUL            |              |
| check_in   | datetime  | NOT NULL              |              |
| check_out  | datetime  | NOT NULL              |              |
| occupants  | datetime  | NOT NULL              |              |
| created-at | ManyToONe | NOT NULL,             |              |
| traveler   | ManyToONe | NOT NULL, OrphanTrue  | User         |
| room       | ManyToONe | NULL, OrphanTrue      | Room         |
| rewiew     | OneToOne  | NULL, OrphanTrue      | Rewiew       |


### Equipment

this entity represents the equipments fro a room.

| Property   | type      | Description | Relationship |
| --------   | ----      | ----------- | ------------ |
| name       | string    | 50 NOT NUL  |              |
| rooms      | ManyToOne |             | Room         |