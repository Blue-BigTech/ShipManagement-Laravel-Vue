import authRepository from './authRepository'
import boatRepository from './boatRepository'
import cityRepository from './cityRepository'
import facilityRepository from './facilityRepository'
import fishingOptionRepository from './fishingOptionRepository'
import lenderPostRepository from './lenderPostRepository'
import lenderRepository from './lenderRepository'
import memberTypeRepository from './memberTypeRepository'
import operationRepository from './operationRepository'
import paymentOptionRepository from './paymentOptionRepository'
import portRepository from './portRepository'
import prefectureRepository from './prefectureRepository'
import regionRepository from './regionRepository'
import targetRepository from './targetRepository'
import userRepository from './userRepository'

const repositories = {
  auth: authRepository,
  boats: boatRepository,
  cities: cityRepository,
  facilities: facilityRepository,
  fishingOptions: fishingOptionRepository,
  lenderPosts: lenderPostRepository,
  lenders: lenderRepository,
  memberTypes: memberTypeRepository,
  operations: operationRepository,
  paymentOptions: paymentOptionRepository,
  ports: portRepository,
  prefectures: prefectureRepository,
  regions: regionRepository,
  targets: targetRepository,
  users: userRepository,
}

// eslint-disable-next-line import/prefer-default-export
export const RepositoryFactory = {
  get: name => repositories[name],
}
