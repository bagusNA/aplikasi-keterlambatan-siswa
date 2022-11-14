export interface Absentee {
  // columns
  id: number
  student_id: number
  picket_schedule_id: number
  description?: string
  created_at?: Date
  updated_at?: Date
  // relations
  student: Student
  schedule: PicketSchedule
}
export type Absentees = Absentee[]

export interface Option {
  // columns
  id: number
  slug: string
  value: string
  created_at?: Date
  updated_at?: Date
}
export type Options = Option[]

export interface PicketSchedule {
  // columns
  id: number
  picket_session_id: number
  teacher_id: number
  school_year_id: number
  created_at?: Date
  updated_at?: Date
  // relations
  session: PicketSession
  teacher: Teacher
  year: SchoolYear
}
export type PicketSchedules = PicketSchedule[]

export interface PicketSession {
  day: "Mon" | "Tue" | "Wed" | "Thu" | "Fri" | "Sat" | "Sun"
  time_start: string,
  time_end: string,
  // relations
  schedules: PicketSchedules
  created_at?: Date
  updated_at?: Date
}
export type PicketSessions = PicketSession[]

export interface Role {
  // columns
  id: number
  name: string
  created_at?: Date
  updated_at?: Date
  // relations
  user: Users
}
export type Roles = Role[]

export interface SchoolClass {
  // columns
  id: number
  grade: boolean
  specialty_id: number
  number: boolean
  teacher_id: number
  created_at?: Date
  updated_at?: Date
  // relations
  specialty: Specialty
  teacher: Teacher
}
export type SchoolClasses = SchoolClass[]

export interface SchoolYear {
  // columns
  id: number
  created_at?: Date
  updated_at?: Date
  // relations
  students: Students
  picket_schedules: PicketSchedules
}
export type SchoolYears = SchoolYear[]

export interface Specialty {
  // columns
  id: number
  initial: string
  name: string
  desc: string
  created_at?: Date
  updated_at?: Date
  // relations
  classes: SchoolClasses
}
export type Specialties = Specialty[]

export interface Student {
  // relations
  parent: Parent
  user: User
  class: SchoolClass
  year: SchoolYear
}
export type Students = Student[]

export interface StudentParent {
  // columns
  id: number
  user_id: number
  name: string
  student_id: number
  created_at?: Date
  updated_at?: Date
  // relations
  student: Student
  user: User
}
export type StudentParents = StudentParent[]

export interface Teacher {
  // columns
  id: number
  user_id: number
  nip: string
  name: string
  created_at?: Date
  updated_at?: Date
  // relations
  picket_schedule: PicketSchedules
  class: SchoolClass
}
export type Teachers = Teacher[]

export interface User {
  // columns
  id: number
  username: string
  password: string
  role_id: number
  remember_token?: string
  created_at?: Date
  updated_at?: Date
  // relations
  role: Role
  students: Students
  teachers: Teachers
  parents: Parents
}
export type Users = User[]
