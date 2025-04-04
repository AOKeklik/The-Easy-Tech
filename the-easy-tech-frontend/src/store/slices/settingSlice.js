import { URL_API } from '@/config/config'
import { createSlice, createAsyncThunk } from '@reduxjs/toolkit'

export const fetchSettings = createAsyncThunk('setting/fetchSettings', async () => {
    const res = await fetch(`${URL_API}/setting`)
    const data = await res.json()
    return data?.data
})

const settingSlice = createSlice({
  name: 'setting',
  initialState: {
    data: null,
    loading: false,
    error: null,
  },
  extraReducers: (builder) => {
    builder
      .addCase(fetchSettings.pending, (state) => {
        state.loading = true
        state.error = null
      })
      .addCase(fetchSettings.fulfilled, (state, action) => {
        state.loading = false
        state.data = action.payload
      })
      .addCase(fetchSettings.rejected, (state, action) => {
        state.loading = false
        state.error = action.error.message
      });
  },
});

export default settingSlice.reducer
