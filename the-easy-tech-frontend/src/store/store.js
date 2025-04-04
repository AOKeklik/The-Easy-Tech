import { configureStore } from '@reduxjs/toolkit';
import settingReducer from './slices/settingSlice';

export const store = configureStore({
  reducer: {
    setting: settingReducer,
  },
})