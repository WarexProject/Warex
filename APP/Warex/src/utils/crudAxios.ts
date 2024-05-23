import axios from 'axios'
export const BASEURL: string = 'http://localhost:3000'

export const saveData = async (url: string, table: string, data: any) => {
  try {
    await axios.post(`${url}/${table}`, data)
  } catch (e) {
    console.log(e)
  }
}

export const getData = async (
  url: string,
  table: string,
  field: string,
  value: string
): Promise<Array<any>> => {
  try {
    const response = await axios.get(`${url}/${table}?${field}=${value}`)
    return response.data
  } catch (error) {
    console.log(error)
    return []
  }
}

export const updateData = async (url: string, table: string, id: string, newData: any) => {
  try {
    await axios.put(`${url}/${table}/${id}`, newData)
  } catch (error) {
    console.log(error)
  }
}

export const updateFieldData = async (
  url: string,
  table: string,
  id: string,
  field: string,
  value: any
) => {
  try {
    await axios.patch(`${url}/${table}/${id}`, { [field]: value })
  } catch (error) {
    console.log(error)
  }
}

export const deleteData = async (url: string, table: string, id: string) => {
  try {
    await axios.delete(`${url}/${table}/${id}`)
  } catch (error) {
    console.log(error)
  }
}
